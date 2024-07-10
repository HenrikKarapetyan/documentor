<?php

namespace Henrik\Documentor\DocHtmlGenerators;

use Henrik\View\Renderer;

class ImplementedInterfacesDocGenerator extends DocViewGenerator
{


    public function __construct(Renderer $renderer, private readonly array $interfaceNames)
    {
        parent::__construct($renderer);
    }

    public function generate(): string
    {
       return $this->renderer->render('class-docs/implemented-interfaces', ['interfaces' => $this->interfaceNames]);
    }
}