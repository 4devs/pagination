<?php

namespace FDevs\Pagination\Extension\ArrayType;

use FDevs\Pagination\Extension\OffsetExtension as BaseExtension;
use FDevs\Pagination\Model\PaginationInterface;

class OffsetExtension extends BaseExtension
{
    /**
     * {@inheritdoc}
     */
    public function prepareTarget($target, array $options, PaginationInterface $pagination)
    {
        $target = parent::prepareTarget($target, $options, $pagination);

        return array_slice($target, $options['offset']);
    }
}
