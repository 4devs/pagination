<?php

namespace FDevs\Pagination\Extension\Doctrine\ORM;

use Doctrine\ORM\Tools\Pagination\Paginator;
use FDevs\Pagination\Extension\LimitExtension as BaseExtension;
use FDevs\Pagination\Model\PaginationInterface;

class LimitExtension extends BaseExtension
{
    /**
     * {@inheritdoc}
     */
    public function prepareTarget($target, array $options, PaginationInterface $pagination)
    {
        /** @var Paginator $target */
        $target = parent::prepareTarget($target, $options, $pagination);
        $target->getQuery()->setMaxResults($options['limit']);

        return $target;
    }
}
