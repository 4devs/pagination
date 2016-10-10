<?php

namespace FDevs\Pagination\Utils\Sort;

use FDevs\Pagination\Utils\SortInterface;

class Sort implements SortInterface
{
    const DIRECTION_ASC = 'ASC';
    const DIRECTION_DESC = 'DESC';
    /**
     * @var string
     */
    private $field;

    /**
     * @var string
     */
    private $direction = self::DIRECTION_ASC;

    /**
     * {@inheritdoc}
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * {@inheritdoc}
     */
    public function isAsc()
    {
        return strtoupper($this->direction) === self::DIRECTION_ASC;
    }

    /**
     * @param string $field
     *
     * @return Sort
     */
    public function setField($field)
    {
        $this->field = $field;

        return $this;
    }

    /**
     * @param mixed $direction
     *
     * @return Sort
     */
    public function setDirection($direction)
    {
        $this->direction = $direction;

        return $this;
    }
}
