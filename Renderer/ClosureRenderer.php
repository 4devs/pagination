<?php

namespace FDevs\Pagination\Renderer;

use FDevs\Pagination\Model\PaginationInterface;

class ClosureRenderer implements RendererInterface
{
    /**
     * @var \Closure
     */
    private $renderer;

    /**
     * ClosureRenderer constructor.
     *
     * @param \Closure $renderer
     */
    public function __construct(\Closure $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * {@inheritdoc}
     */
    public function render(PaginationInterface $pagination, array $options = [])
    {
        return call_user_func($this->renderer, $pagination, $options);
    }
}
