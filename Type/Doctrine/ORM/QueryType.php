<?php

namespace FDevs\Pagination\Type\Doctrine\ORM;

use Doctrine\ORM\Query;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QueryType extends PaginatorType
{
    /**
     * {@inheritdoc}
     */
    public function prepareTarget($target, array $options)
    {
        return new Paginator($target, $options['fetch_join']);
    }

    /**
     * {@inheritdoc}
     */
    public function support($target)
    {
        return $target instanceof Query;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefined(['fetch_join'])
            ->addAllowedTypes('fetch_join', ['bool'])
            ->setDefault('fetch_join', false);
    }

}
