## Installation

    composer require brezgalov/php-typed-collection dev-master

## Description

Abstraction designed to make typed collections based on **Iterator** interface

If you need more functions - feel fre to add them to your custom implementation. 
You can implement ArrayAccess when it required

## Usage

    class MyClassCollection extends AbstractTypedIterator
    {
        /**
         * override to set collection element type 
         */
        public function current(): MyClass
        {
            return parent::current();
        }
    
        /**
         * Make shure items are same type 
         */
        protected function validateItem($item): bool
        {
            return $item instanceof MyClass;
        }
    }

    // now go use

    $collection = new MyClassCollection([
        new MyClass(),
        new MyClass(),
        new MyClass(),
    ]);

    foreach($collection as $class) {
        // $class instance of MyClass - put your handle logic here 
    }

## Deep cloning

Objects stored inside collection are references. 

If you want to clone collection safely - consider using 
**ContainerDeepCloneTrait** as it shown below:

    class MyClassCollection extends AbstractTypedIterator
    {
        use ContainerDeepCloneTrait;

        public function current(): MyClass
        {
            return parent::current();
        }

        protected function validateItem($item): bool
        {
            return $item instanceof MyClass;
        }
    }

    ...

    $clone = clone $myClassCollection; // it's deep cloned now 
