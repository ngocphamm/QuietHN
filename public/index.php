<!DOCTYPE html>
<html>
  <head>
    <title>Quiet Hacker News - 🤫🗞</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="hacker news, hacker, news, quiet, quiet hacker news, tom speak, hn, hn without comments, hacker news without comments, hacker news no comments">
    <meta name="HandheldFriendly" content="true" />
    <meta name="Description" content="A quieter approach to Hacker News. Links and nothing else." />
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">

    <style>
      html, body {
        font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Helvetica, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol;
        background: rgb(24, 26, 27);
      }
      body {
        width: 800px;
        margin: 44px auto;
      }
      h1, span {
        color: rgb(227, 225, 221);
      }
      ol {
        margin: 0 0 0 18px;
        padding: 0;
      }
      li {
        margin-bottom: 11px;
        color: rgba(227, 225, 221, 0.7);
        font-size: 14px;
      }
      ol.comfort li {
        margin-bottom: 22px;
        font-size: 16px;
      }
      li a {
        color: rgb(77, 172, 253);
        text-decoration: none;
      }
      li a:hover {
        text-decoration: underline;
      }
      li a:visited {
        color: rgb(129, 131, 132);
      }
      .links {
        margin-top: 50px;
        padding-bottom: 4px;
      }
      .links a {
        float: left;
        color: rgb(77, 172, 253);
      }
      .links a:last-of-type {
        float: right;
      }

      @media only screen and (max-device-width: 820px) {
        body {
          width: 85%;
        }
        h1 {
          margin-bottom: 30px;
          font-size: 40px;
        }
        li {
          margin-bottom: 16px;
          font-size: 16px;
        }
        li span {
          display: block;
        }
        .links a {
          font-size: 18px;
        }
      }

      @media only screen
        and (min-device-width : 320px)
        and (max-device-width : 480px) {
        h1 {
          font-size: 32px;
        }
      }
    </style>
  </head>
  <body>
    <h1>Quiet Hacker News</h1>

    <ol id="list">
        <?php

            require_once 'functions.php';

            getTopStories();

        ?>
    </ol>

    <div class="links">
      <span>Proudly written in PHP.</span>
      <a href="https://github.com/tomspeak/quiet-hacker-news">Inspired By</a>
    </div>
  </body>
</html>
