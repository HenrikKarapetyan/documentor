<?php

namespace Henrik\Documentor\DocHtmlGenerators;

use Henrik\View\Renderer;

class MethodsDocumentationGenerator extends DocViewGenerator implements MethodDocGeneratorInterface
{
    public function __construct(Renderer $renderer, private readonly array $methods)
    {
        parent::__construct($renderer);
    }

    public function generate(): string
    {
        return $this->renderer->render('class-docs/class-methods', ['methods' => $this->methods]);
    }
}