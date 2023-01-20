<?php

namespace Brezgalov\PhpTypedCollection;

abstract class AbstractTypedIterator extends AbstractTypedContainer implements \Iterator
{
    protected int $offset = 0;

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
