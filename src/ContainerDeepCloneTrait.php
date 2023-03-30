<?php

namespace Brezgalov\PhpTypedCollection;

trait ContainerDeepCloneTrait
{
    protected array $container = [];
    
    public function __clone(): void
    {
        foreach ($this->container as $i => $item) {
            if (is_object($item)) {
                $this->container[$i] = clone $item;
            }
        }
    }
}
