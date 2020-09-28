<?php

declare(strict_types=1);

namespace Longyan\Kafka\Protocol\OffsetForLeaderEpoch;

use Longyan\Kafka\Protocol\AbstractResponse;
use Longyan\Kafka\Protocol\ProtocolField;

class OffsetForLeaderEpochResponse extends AbstractResponse
{
    /**
     * The duration in milliseconds for which the request was throttled due to a quota violation, or zero if the request did not violate any quota.
     *
     * @var int
     */
    protected $throttleTimeMs;

    /**
     * Each topic we fetched offsets for.
     *
     * @var OffsetForLeaderTopicResult[]
     */
    protected $topics = [];

    public function __construct()
    {
        if (!isset(self::$maps[self::class])) {
            self::$maps[self::class] = [
                new ProtocolField('throttleTimeMs', 'int32', false, [2, 3], [], [], [], null),
                new ProtocolField('topics', OffsetForLeaderTopicResult::class, true, [0, 1, 2, 3], [], [], [], null),
            ];
            self::$taggedFieldses[self::class] = [
            ];
        }
    }

    public function getRequestApiKey(): ?int
    {
        return 23;
    }

    public function getFlexibleVersions(): array
    {
        return [];
    }

    public function getThrottleTimeMs(): int
    {
        return $this->throttleTimeMs;
    }

    public function setThrottleTimeMs(int $throttleTimeMs): self
    {
        $this->throttleTimeMs = $throttleTimeMs;

        return $this;
    }

    /**
     * @return OffsetForLeaderTopicResult[]
     */
    public function getTopics(): array
    {
        return $this->topics;
    }

    /**
     * @param OffsetForLeaderTopicResult[] $topics
     */
    public function setTopics(array $topics): self
    {
        $this->topics = $topics;

        return $this;
    }
}
