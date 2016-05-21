<?php

namespace FDevs\Pagination\Extension;

use FDevs\Pagination\Model\PaginationInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

interface ExtensionInterface
{
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver);

    /**
     * @param PaginationInterface $pagination
     *
     * @return bool
     */
    public function supportPagination(PaginationInterface $pagination);

    /**
     * @param mixed $target
     * @param array $options
     *
     * @return mixed
     */
    public function prepareTarget($target, array $options, PaginationInterface $pagination);

    /**
     * @return ExtensionInterface[]
     */
    public function getDependency();
}
