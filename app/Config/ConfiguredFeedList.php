<?php

namespace App\Config;

use ArrayIterator;
use IteratorAggregate;
use JsonSerializable;
use Traversable;

class ConfiguredFeedList implements IteratorAggregate, JsonSerializable
{
    /**
     * @var ConfiguredFeed[]
     */
    protected array $feeds;

    public function __construct(array $feeds = [])
    {
        $this->feeds = $feeds;
    }

    public function getFeedIds(): array
    {
        return array_map(fn (ConfiguredFeed $feed) => $feed->feed->id, $this->feeds);
    }

    public function getMappedById(): array
    {
        $map = [];

        foreach ($this->feeds as $feed) {
            $map[$feed->feed->id] = $feed;
        }

        return $map;
    }

    public function reloadOutdatedFeeds(): int
    {
        $refreshCount = 0;

        foreach ($this->feeds as $feed) {
            if ($feed->isOutdated()) {
                $feed->startReloading();
                $refreshCount++;
            }
        }

        return $refreshCount;
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->feeds);
    }

    public function jsonSerialize(): mixed
    {
        return array_values($this->feeds);
    }
}
