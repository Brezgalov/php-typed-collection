<?php

namespace Brezgalov\PhpTypedCollection;

abstract class AbstractTypedCloneSafeIterator extends AbstractTypedIterator
{
    use ContainerDeepCloneTrait;

    public function __construct(array $items = [])
    {
        parent::__construct($this->cloneArrayItems($items));
    }
}
