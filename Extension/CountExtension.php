<?php

namespace FDevs\Pagination\Extension;


use FDevs\Pagination\Model\CountPaginationInterface;
use FDevs\Pagination\Model\PaginationInterface;

abstract class CountExtension extends AbstractExtension
{
    /**
     * {@inheritdoc}
     */
    public function supportPagination(PaginationInterface $pagination)
    {
        return $pagination instanceof CountPaginationInterface;
    }


}