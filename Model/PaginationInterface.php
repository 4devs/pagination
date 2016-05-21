<?php

namespace FDevs\Pagination\Model;

use Countable;
use Iterator;
use ArrayAccess;

interface PaginationInterface extends Countable, Iterator, ArrayAccess
{
    /**
     * @return mixed[]
     */
    public function getItems();

    /**
     * @param array|\Traversable $items
     *
     * @return self
     */
    public function setItems($items);
}
