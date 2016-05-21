<?php

namespace FDevs\Pagination\Extension\ArrayType;

use FDevs\Pagination\Extension\AbstractExtension;
use FDevs\Pagination\Model\CountPaginationInterface;
use FDevs\Pagination\Model\PaginationInterface;

class CountExtension extends AbstractExtension
{
    /**
     * {@inheritdoc}
     */
    public function supportPagination(PaginationInterface $pagination)
    {
        return $pagination instanceof CountPaginationInterface;
    }

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
