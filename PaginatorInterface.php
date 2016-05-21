<?php

namespace FDevs\Pagination;

use FDevs\Pagination\Exception\TargetNotSupportException;
use FDevs\Pagination\Model\PaginationInterface;

interface PaginatorInterface
{
    /*
     * @param mixed                    $target
     * @param array                    $options
     * @param PaginationInterface|null $pagination
     *
     * @return PaginationInterface
     *
     * @throws TargetNotSupportException
     */
    public function paginate($target, array $options = [], PaginationInterface $pagination = null);
}
