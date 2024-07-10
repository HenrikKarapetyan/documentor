<?php

namespace Henrik\Documentor\DocHtmlGenerators;

use Henrik\View\Renderer;
use ReflectionClass;

class TraitsDocGenerator extends DocViewGenerator
{

    /**
     * @param Renderer $renderer
     * @param ReflectionClass[] $traits
     */
    public function __construct(Renderer $renderer, private readonly array $traits)
    {
        parent::__construct($renderer);
    }

    public function generate(): string
    {
        return $this->renderer->render('class-docs/class-traits',['traits'=>$this->traits]);
    }
}