<?php

namespace Henrik\Documentor\DocHtmlGenerators;

use Henrik\View\Renderer;

abstract class DocViewGenerator implements GeneratorInterface
{
    public function __construct(protected Renderer $renderer) {}
}