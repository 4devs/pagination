<?php

namespace FDevs\Pagination\Type\Doctrine\MongoDB;

use Doctrine\MongoDB\Query\Query;
use FDevs\Pagination\Model\PaginationInterface;
use FDevs\Pagination\Type\AbstractType;

class QueryType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function paginate($target, PaginationInterface $pagination, array $options)
    {
        /* @var Query $target */
        $pagination->setItems($target->execute()->toArray());

        return $pagination;
    }

    /**
     * {@inheritdoc}
     */
    public function support($target)
    {
        return $target instanceof Query;
    }
}
