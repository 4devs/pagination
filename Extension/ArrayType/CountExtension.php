<?php

namespace FDevs\Pagination\Extension\ArrayType;

use FDevs\Pagination\Extension\CountExtension as BaseExtension;
use FDevs\Pagination\Model\CountPaginationInterface;
use FDevs\Pagination\Model\PaginationInterface;

class CountExtension extends BaseExtension
{
    /**
     * {@inheritdoc}
     */
    public function prepareTarget($target, array $options, PaginationInterface $pagination)
    {
        /* @var $pagination CountPaginationInterface */
        $pagination->setCount(count($target));

        return $target;
    }
}
