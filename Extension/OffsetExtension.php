<?php

namespace FDevs\Pagination\Extension;

use FDevs\Pagination\Model\OffsetPaginationInterface;
use FDevs\Pagination\Model\PaginationInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class OffsetExtension extends AbstractExtension
{
    /**
     * {@inheritdoc}
     */
    public function supportPagination(PaginationInterface $pagination)
    {
        return $pagination instanceof OffsetPaginationInterface;
    }

    /**
     * {@inheritdoc}
     */
    public function prepareTarget($target, array $options, PaginationInterface $pagination)
    {
        /* @var $pagination OffsetPaginationInterface */
        $pagination->setOffset($options['offset']);

        return $target;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefined(['offset'])
            ->setDefaults(['offset' => 0])
            ->setAllowedTypes('offset', ['int'])
        ;
    }
}
