<?php

namespace FDevs\Pagination\Extension\Doctrine\MongoDB;

use FDevs\Pagination\Extension\LimitExtension as BaseExtension;
use FDevs\Pagination\Model\PaginationInterface;

class LimitExtension extends BaseExtension
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
        $queryOptions['limit'] = $options['limit'];
        $resultQuery = clone $target;
        $query->setValue($resultQuery, $queryOptions);

        return $resultQuery;
    }
}
