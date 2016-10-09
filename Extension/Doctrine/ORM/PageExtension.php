<?php

namespace FDevs\Pagination\Extension\Doctrine\ORM;

use FDevs\Pagination\Extension\PageExtension as BaseExtension;

class PageExtension extends BaseExtension
{
    /**
     * {@inheritdoc}
     */
    public function getDependency()
    {
        return [OffsetExtension::class, LimitExtension::class];
    }
}
