<?php

namespace FDevs\Pagination\Model;

interface CountPaginationInterface extends PaginationInterface
{
    /**
     * @return int
     */
    public function getCount();

    /**
     * @param int $count
     *
     * @return self
     */
    public function setCount($count);
}
