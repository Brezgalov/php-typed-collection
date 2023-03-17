<?php

namespace Brezgalov\PhpTypedCollection;

use Countable;

abstract class AbstractTypedContainer implements Countable
{
    protected array $container = [];

    public function __construct(array $items = [])
    {
        foreach ($items as $item) {
            $this->addItem($item);
        }
    }

    public function addItem(mixed $item): AbstractTypedContainer
    {
        if ($this->validateItem($item)) {
            $this->container[] = $item;
        }

        return $this;
    }

    protected abstract function validateItem($item): bool;

    public function count(): int
    {
        return count($this->container);
    }

    public function toArray(): array
    {
        return $this->container;
    }
}
