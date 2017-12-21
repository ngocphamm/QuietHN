<?php

require_once __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Pool;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

/**
 * Get top stories
 *
 * @param int $maxItems Max number of items to show
 *
 * @return void
 */
function getTopStories(int $maxItems = 30)
{
    $client = new Client();

    $response = $client->get('https://hacker-news.firebaseio.com/v0/topstories.json');
    $topStories = json_decode($response->getBody());

    $promise;
    $stories = [];

    $requests = function ($storyIds) {
        foreach ($storyIds as $sId) {
            yield new Request('GET', "https://hacker-news.firebaseio.com/v0/item/{$sId}.json");
        }
    };

    $pool = new Pool($client, $requests(array_slice($topStories, 0, 100)), [
        'concurrency' => 5,
        'fulfilled' => function ($response, $index) use(&$stories, &$promise, $maxItems) {
            // Resolve the promise if we have enough
            if (count($stories) === $maxItems) {
                $promise->resolve(true);
                return;
            }

            $story = json_decode($response->getBody());

            if ((isset($story->text) && $story->text !== '') || !isset($story->url)) return;

            array_push($stories, $story);
        },
        'rejected' => function ($reason, $index) {
            // this is delivered each failed request
        },
    ]);

    // Initiate the transfers and create a promise
    $promise = $pool->promise();

    // Force the pool of requests to complete. AKA wait until we have enough items.
    $promise->wait();

    foreach ($stories as $story) {
        $linkDomain = parse_url($story->url)['host'];

        echo "<li data-sid='{$story->id}'>" .
                "<a href='{$story->url}' target='_blank' rel='noopener noreferrer'>{$story->title}</a> " .
                "<span>(" .
                    "{$linkDomain} | " .
                    "<a href='https://news.ycombinator.com/item?id={$story->id}' target='_blank' rel='noopener noreferrer'>hn</a>" .
                ")</span>" .
            "</li>";
    }
}
