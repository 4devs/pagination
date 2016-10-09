<?php

namespace FDevs\Pagination\Type\Doctrine\ORM;

use Doctrine\ORM\Tools\Pagination\Paginator;
use FDevs\Pagination\Model\PaginationInterface;
use FDevs\Pagination\Type\AbstractType;

class PaginatorType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function paginate($target, PaginationInterface $pagination, array $options)
    {
        /* @var Paginator $target */
        $pagination->setItems(array_values(iterator_to_array($target->getIterator())));

        return $pagination;
    }

    /**
     * {@inheritdoc}
     */
    public function support($target)
    {
        return $target instanceof Paginator;
    }
}
