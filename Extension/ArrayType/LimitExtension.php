<?php

namespace FDevs\Pagination\Extension\ArrayType;

use FDevs\Pagination\Extension\LimitExtension as BaseExtension;
use FDevs\Pagination\Model\PaginationInterface;

class LimitExtension extends BaseExtension
{
    /**
     * {@inheritdoc}
     */
    public function prepareTarget($target, array $options, PaginationInterface $pagination)
    {
        $target = parent::prepareTarget($target, $options, $pagination);

        return array_slice($target, 0, $options['limit']);
    }
}
