<?php

namespace Henrik\Documentor\DocHtmlGenerators;

use Henrik\View\Renderer;
use ReflectionProperty;

class PropertiesDocumentationGenerator extends DocViewGenerator implements PropertiesDocGeneratorInterface
{

    /**
     * @param Renderer $renderer
     * @param ReflectionProperty[] $properties
     */
    public function __construct(Renderer $renderer, private readonly array $properties)
    {
        parent::__construct($renderer);
    }

    public function generate(): string
    {
        return $this->renderer->render('class-doc/class-properties', ['properties' => $this->properties]);
    }
}