<?php

namespace FDevs\Pagination\Type;

use FDevs\Pagination\Model\PaginationInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

interface PaginateInterface
{
    /**
     * @param mixed               $target
     * @param PaginationInterface $pagination
     * @param array               $options
     *
     * @return PaginationInterface
     */
    public function paginate($target, PaginationInterface $pagination, array $options);

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver);

    /**
     * @param mixed $target
     *
     * @return bool
     */
    public function support($target);

    /**
     * @param mixed $target
     * @param array $options
     *
     * @return mixed
     */
    public function prepareTarget($target, array $options);
}
