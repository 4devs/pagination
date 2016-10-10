<?php

namespace FDevs\Pagination\Utils;

interface SortInterface
{
    /**
     * @return string
     */
    public function getField();

    /**
     * @return bool
     */
    public function isAsc();
}
