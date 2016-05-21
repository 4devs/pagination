<?php

namespace FDevs\Pagination\Extension;

use FDevs\Pagination\Model\LimitPaginationInterface;
use FDevs\Pagination\Model\OffsetPaginationInterface;
use FDevs\Pagination\Model\PaginationInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class PageExtension extends AbstractExtension
{
    /**
     * {@inheritdoc}
     */
    public function supportPagination(PaginationInterface $pagination)
    {
        return $pagination instanceof OffsetPaginationInterface && $pagination instanceof LimitPaginationInterface;
    }

    /**
     * {@inheritdoc}
     */
    public function prepareTarget($target, array $options, PaginationInterface $pagination)
    {
        $pagination
            ->setLimit($options['limit'])
            ->setOffset($options['offset'])
        ;

        return $target;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefined(['page', 'limit', 'offset'])
            ->setDefaults([
                'page' => 1,
                'limit' => 10,
                'offset' => function (Options $options) {
                    return abs($options['page'] - 1) * $options['limit'];
                },
            ])
            ->setAllowedTypes('limit', ['int'])
            ->setAllowedTypes('page', ['int'])
            ->setAllowedTypes('offset', ['int'])
        ;
    }
}
