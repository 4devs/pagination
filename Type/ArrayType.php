<?php

namespace FDevs\Pagination\Type;

use FDevs\Pagination\Model\PaginationInterface;

class ArrayType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function paginate($target, PaginationInterface $pagination, array $options)
    {
        $pagination->setItems($target);

        return $pagination;
    }

    /**
     * {@inheritdoc}
     */
    public function support($target)
    {
        return is_array($target);
    }
}
