<?php

namespace FDevs\Pagination\Model;

interface LimitPaginationInterface extends PaginationInterface
{
    /**
     * @return int
     */
    public function getLimit();

    /**
     * @param int $limit
     *
     * @return self
     */
    public function setLimit($limit);
}
