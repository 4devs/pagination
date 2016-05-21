<?php

namespace FDevs\Pagination\Renderer;

use FDevs\Pagination\Model\PaginationInterface;

class TwigRenderer implements RendererInterface
{
    /**
     * @var \Twig_Environment
     */
    private $twig;

    /**
     * @var string
     */
    private $template;

    /**
     * TwigRenderer constructor.
     *
     * @param \Twig_Environment $twig
     * @param string            $template
     */
    public function __construct(\Twig_Environment $twig, $template)
    {
        $this->twig = $twig;
        $this->template = $template;
    }

    /**
     * {@inheritdoc}
     */
    public function render(PaginationInterface $pagination, array $options = [])
    {
        return $this->twig->render($this->template, ['pagination' => $pagination]);
    }
}
