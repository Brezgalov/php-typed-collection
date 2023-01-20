<?php

namespace Brezgalov\PhpTypedCollection;

abstract class AbstractTypedContainer
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

    public function toArray(): array
    {
        return $this->container;
    }
}
