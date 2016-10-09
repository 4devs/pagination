<?php

namespace FDevs\Pagination\Extension\Doctrine\ORM;

use FDevs\Pagination\Extension\OffsetExtension as BaseExtension;
use FDevs\Pagination\Model\PaginationInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;

class OffsetExtension extends BaseExtension
{
    /**
     * {@inheritdoc}
     */
    public function prepareTarget($target, array $options, PaginationInterface $pagination)
    {
        /** @var Paginator $target */
        $target = parent::prepareTarget($target, $options, $pagination);
        $target->getQuery()->setFirstResult($options['offset']);

        return $target;
    }
}
