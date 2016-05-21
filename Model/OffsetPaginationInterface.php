<?php

namespace FDevs\Pagination\Model;

interface OffsetPaginationInterface extends PaginationInterface
{
    /**
     * @return int
     */
    public function getOffset();

    /**
     * @param int $offset
     *
     * @return self
     */
    public function setOffset($offset);
}
