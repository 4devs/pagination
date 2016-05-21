<?php

namespace FDevs\Pagination\Type;

use FDevs\Pagination\Model\PaginationInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class AbstractType implements PaginateInterface
{
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
    }

    /**
     * @param mixed $target
     * @param array $options
     *
     * @return mixed
     */
    public function prepareTarget($target, array $options)
    {
        return $target;
    }

    /**
     * {@inheritdoc}
     */
    public function paginate($target, PaginationInterface $pagination, array $options)
    {
        return $pagination;
    }
}
