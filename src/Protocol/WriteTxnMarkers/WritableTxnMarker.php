<?php

declare(strict_types=1);

namespace Longyan\Kafka\Protocol\WriteTxnMarkers;

use Longyan\Kafka\Protocol\AbstractStruct;
use Longyan\Kafka\Protocol\ProtocolField;

class WritableTxnMarker extends AbstractStruct
{
    /**
     * The current producer ID.
     *
     * @var int
     */
    protected $producerId;

    /**
     * The current epoch associated with the producer ID.
     *
     * @var int
     */
    protected $producerEpoch;

    /**
     * The result of the transaction to write to the partitions (false = ABORT, true = COMMIT).
     *
     * @var bool
     */
    protected $transactionResult;

    /**
     * Each topic that we want to write transaction marker(s) for.
     *
     * @var WritableTxnMarkerTopic[]
     */
    protected $topics = [];

    /**
     * Epoch associated with the transaction state partition hosted by this transaction coordinator.
     *
     * @var int
     */
    protected $coordinatorEpoch;

    public function __construct()
    {
        if (!isset(self::$maps[self::class])) {
            self::$maps[self::class] = [
                new ProtocolField('producerId', 'int64', false, [0], [], [], [], null),
                new ProtocolField('producerEpoch', 'int16', false, [0], [], [], [], null),
                new ProtocolField('transactionResult', 'bool', false, [0], [], [], [], null),
                new ProtocolField('topics', WritableTxnMarkerTopic::class, true, [0], [], [], [], null),
                new ProtocolField('coordinatorEpoch', 'int32', false, [0], [], [], [], null),
            ];
            self::$taggedFieldses[self::class] = [
            ];
        }
    }

    public function getFlexibleVersions(): array
    {
        return [];
    }

    public function getProducerId(): int
    {
        return $this->producerId;
    }

    public function setProducerId(int $producerId): self
    {
        $this->producerId = $producerId;

        return $this;
    }

    public function getProducerEpoch(): int
    {
        return $this->producerEpoch;
    }

    public function setProducerEpoch(int $producerEpoch): self
    {
        $this->producerEpoch = $producerEpoch;

        return $this;
    }

    public function getTransactionResult(): bool
    {
        return $this->transactionResult;
    }

    public function setTransactionResult(bool $transactionResult): self
    {
        $this->transactionResult = $transactionResult;

        return $this;
    }

    /**
     * @return WritableTxnMarkerTopic[]
     */
    public function getTopics(): array
    {
        return $this->topics;
    }

    /**
     * @param WritableTxnMarkerTopic[] $topics
     */
    public function setTopics(array $topics): self
    {
        $this->topics = $topics;

        return $this;
    }

    public function getCoordinatorEpoch(): int
    {
        return $this->coordinatorEpoch;
    }

    public function setCoordinatorEpoch(int $coordinatorEpoch): self
    {
        $this->coordinatorEpoch = $coordinatorEpoch;

        return $this;
    }
}
