<?php

namespace FDevs\Pagination\Type\Doctrine\MongoDB;

use Doctrine\MongoDB\Query\Builder;

class QueryBuilderType extends QueryType
{
    /**
     * {@inheritdoc}
     */
    public function prepareTarget($target, array $options)
    {
        return $target->getQuery();
    }

    /**
     * {@inheritdoc}
     */
    public function support($target)
    {
        return $target instanceof Builder;
    }
}
