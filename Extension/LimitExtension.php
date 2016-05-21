<?php

namespace FDevs\Pagination\Extension;

use FDevs\Pagination\Model\LimitPaginationInterface;
use FDevs\Pagination\Model\PaginationInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class LimitExtension extends AbstractExtension
{
    /**
     * {@inheritdoc}
     */
    public function supportPagination(PaginationInterface $pagination)
    {
        return $pagination instanceof LimitPaginationInterface;
    }

    /**
     * {@inheritdoc}
     */
    public function prepareTarget($target, array $options, PaginationInterface $pagination)
    {
        /* @var $pagination LimitPaginationInterface */
        $pagination->setLimit($options['limit']);

        return $target;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefined(['limit'])
            ->setDefaults(['limit' => 10])
            ->setAllowedTypes('limit', ['int'])
        ;
    }
}
