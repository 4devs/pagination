<?php

namespace FDevs\Pagination;

use FDevs\Pagination\Extension\ExtensionInterface;

class ExtensionRegistry
{
    /**
     * @var array|ExtensionInterface[]
     */
    public $extensionList = [];

    /**
     * @param ExtensionInterface $extension
     *
     * @return $this
     */
    public function addExtension(ExtensionInterface $extension)
    {
        $this->extensionList[get_class($extension)] = $extension;

        return $this;
    }

    /**
     * @param string $class
     *
     * @return ExtensionInterface|mixed
     */
    public function getExtension($class)
    {
        if (!isset($this->extensionList[$class])) {
            $this->extensionList[$class] = new $class();
        }

        return $this->extensionList[$class];
    }
}
