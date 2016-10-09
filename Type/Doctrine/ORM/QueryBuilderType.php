<?php

namespace FDevs\Pagination\Type\Doctrine\ORM;

use Doctrine\ORM\QueryBuilder;

class QueryBuilderType extends QueryType
{
    /**
     * {@inheritdoc}
     */
    public function support($target)
    {
        return $target instanceof QueryBuilder;
    }
}
