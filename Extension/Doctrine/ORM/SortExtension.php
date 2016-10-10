<?php

namespace FDevs\Pagination\Extension\Doctrine\ORM;

use Doctrine\ORM\Query;
use FDevs\Pagination\Extension\AbstractExtension;
use FDevs\Pagination\Extension\Doctrine\ORM\Query\OrderByWalker;
use FDevs\Pagination\Model\PaginationInterface;
use FDevs\Pagination\Utils\SortListInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SortExtension extends AbstractExtension
{
    /**
     * {@inheritdoc}
     */
    public function prepareTarget($target, array $options, PaginationInterface $pagination)
    {
        if ($options['sort']) {
            /** @var Query $query */
            $query = $target->getQuery();
            $query->setHint(Query::HINT_CUSTOM_TREE_WALKERS, [OrderByWalker::class]);
            $query->setHint(OrderByWalker::HINT_PAGINATOR_SORT_FIELDS, $options['sort']);
        }

        return $target;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefined(['sort'])
            ->setAllowedTypes('sort', [SortListInterface::class, 'null'])
            ->setDefault('sort', null);
    }
}
