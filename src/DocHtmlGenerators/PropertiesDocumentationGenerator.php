<?php

namespace Henrik\Documentor\DocHtmlGenerators;

use ReflectionProperty;

class PropertiesDocumentationGenerator implements PropertiesDocGeneratorInterface
{

    public function __construct(private readonly ReflectionProperty $property)
    {
    }

    public function generate(): string
    {
        $attributeLine = $this->property->getName();
        return sprintf('<div>%s</div><div>%s</div>', $attributeLine, $this->property->getDocComment());
    }
}