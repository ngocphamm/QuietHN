# QuietHN
Totally based on http://github.com/tomspeak/quiet-hacker-news, but uses PHP, with parallel API calls using Guzzle.

Favicon belongs to https://news.ycombinator.com/.

If want to expose to host, add the following to the service, where `8080` is the host port.
```
ports:
  - 8080:80
```

Run `docker compose up`, then go to `localhost:8080` (the port you chose for the host).
