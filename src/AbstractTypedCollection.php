<?php

namespace Brezgalov\PhpTypedCollection;

abstract class AbstractTypedCollection implements \Iterator
{
    protected array $container = [];
    private int $offset;

    public function __construct(array $items)
    {
        $this->rewind();

        foreach ($items as $item) {
            if ($this->validateItem($item)) {
                $this->container[] = $item;
            }
        }
    }

    protected abstract function validateItem($item): bool;

    protected function getOffset(): mixed
    {
        return $this->container[$this->offset];
    }

    public function current(): mixed
    {
        return $this->valid() ? $this->getOffset() : null;
    }

    public function next(): void
    {
        $this->offset += 1;
    }

    public function key(): int
    {
        return $this->offset;
    }

    public function valid(): bool
    {
        return array_key_exists($this->offset, $this->container);
    }

    public function rewind(): void
    {
        $this->offset = 0;
    }
}
