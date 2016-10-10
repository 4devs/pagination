<?php

namespace FDevs\Pagination\Utils\Sort;

use FDevs\Pagination\Utils\SortInterface;
use FDevs\Pagination\Utils\SortListInterface;

class SortList implements SortListInterface
{
    /**
     * @var array
     */
    private $list = [];

    /**
     * SortList constructor.
     *
     * @param array $list [field => direction]
     */
    public function __construct(array $list = [])
    {
        foreach ($list as $field => $direction) {
            $sort = new Sort();
            $sort->setField($field);
            $sort->setDirection($direction);
            $this->addSort($sort);
        }
    }

    /**
     * @param SortInterface $sort
     * @param int           $priority
     *
     * @return $this
     */
    public function addSort(SortInterface $sort, $priority = 0)
    {
        $this->list[$priority][] = $sort;

        return $this;
    }

    /**
     * @return SortInterface[]
     */
    public function getList()
    {
        return call_user_func_array('array_merge', $this->list);
    }
}
