<?php

namespace FDevs\Pagination\Model;

class CountPagination extends Pagination implements CountPaginationInterface
{
    /**
     * @var int
     */
    protected $count;

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param int $count
     *
     * @return CountPagination
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }
}
