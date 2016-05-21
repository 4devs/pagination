<?php

namespace FDevs\Pagination\Renderer;

use FDevs\Pagination\Model\PaginationInterface;

interface RendererInterface
{
    /**
     * @param PaginationInterface $pagination
     * @param array               $options
     *
     * @return string
     */
    public function render(PaginationInterface $pagination, array $options = []);
}
