<?php

namespace FDevs\Pagination\Extension\Doctrine\ORM;

use FDevs\Pagination\Extension\CountExtension as BaseExtension;
use FDevs\Pagination\Model\CountPaginationInterface;
use FDevs\Pagination\Model\PaginationInterface;

class CountExtension extends BaseExtension
{
    /**
     * {@inheritdoc}
     */
    public function prepareTarget($target, array $options, PaginationInterface $pagination)
    {
        /* @var $pagination CountPaginationInterface */
        $pagination->setCount($target->count());

        return $target;
    }
}
