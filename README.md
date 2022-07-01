### TODO

- Testing coverage
- Tag filtering
- Feed filtering
- Docker setup
- GH sponsors info

### Setup

```shell

# Create database
touch storage/database/database.sqlite

```

### Config Format

```txt
https://feed.url.com/feed.xml feed-name #tag-a #tag-b
https://example.com/feed.xml Example #updates #news

# Lines starting with a hash are considered comments.
# Empty lines are fine and will be ignored.

# Underscores in names will be converted to spaces.
https://example.com/feed-b.xml News_Site #news

# Feed color can be set using square brackets after the name.
# The color must be a CSS-compatible color value.
https://example.com/feed-c.xml Blue_News[#0078b9] #news #blue
```

### RSS Info

- Spec: https://cyber.harvard.edu/rss/rss.html#comments

#### Feed URLs For Testing

https://www.bookstackapp.com/blog/index.xml
http://feeds.bbci.co.uk/news/uk/rss.xml
https://feeds.arstechnica.com/arstechnica/index
