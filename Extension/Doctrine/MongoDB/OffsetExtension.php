<?php

namespace FDevs\Pagination\Extension\Doctrine\MongoDB;

use FDevs\Pagination\Extension\OffsetExtension as BaseExtension;
use FDevs\Pagination\Model\PaginationInterface;

class OffsetExtension extends BaseExtension
{
    use QueryProperty;

    /**
     * {@inheritdoc}
     */
    public function prepareTarget($target, array $options, PaginationInterface $pagination)
    {
        $target = parent::prepareTarget($target, $options, $pagination);

        $query = QueryProperty::getProperty();
        $queryOptions = $query->getValue($target);
        $queryOptions['offset'] = $options['offset'];
        $resultQuery = clone $target;
        $query->setValue($resultQuery, $queryOptions);

        return $resultQuery;
    }
}
