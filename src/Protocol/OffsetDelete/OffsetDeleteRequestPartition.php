<?php

declare(strict_types=1);

namespace Longyan\Kafka\Protocol\OffsetDelete;

use Longyan\Kafka\Protocol\AbstractStruct;
use Longyan\Kafka\Protocol\ProtocolField;

class OffsetDeleteRequestPartition extends AbstractStruct
{
    /**
     * The partition index.
     *
     * @var int
     */
    protected $partitionIndex;

    public function __construct()
    {
        if (!isset(self::$maps[self::class])) {
            self::$maps[self::class] = [
                new ProtocolField('partitionIndex', 'int32', false, [0], [], [], [], null),
            ];
            self::$taggedFieldses[self::class] = [
            ];
        }
    }

    public function getFlexibleVersions(): array
    {
        return [];
    }

    public function getPartitionIndex(): int
    {
        return $this->partitionIndex;
    }

    public function setPartitionIndex(int $partitionIndex): self
    {
        $this->partitionIndex = $partitionIndex;

        return $this;
    }
}
