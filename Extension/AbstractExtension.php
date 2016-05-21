<?php

namespace FDevs\Pagination\Extension;

use FDevs\Pagination\Model\PaginationInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class AbstractExtension implements ExtensionInterface
{
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function supportPagination(PaginationInterface $pagination)
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function getDependency()
    {
        return [];
    }
}
