<?php

namespace Brezgalov\PhpTypedCollection;

trait ContainerDeepCloneTrait
{
    protected array $container = [];
    
    public function __clone(): void
    {
        $this->container = $this->cloneArrayItems($this->container);
    }

    protected function cloneArrayItems(array $array): array
    {
        $result = [];

        foreach ($array as $i => $item) {
            $result[] = is_object($item) ? clone $item : $item;
        }

        return $result;
    }
}
