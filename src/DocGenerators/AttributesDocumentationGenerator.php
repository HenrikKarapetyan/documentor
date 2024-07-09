<?php

namespace Henrik\Documentor\DocGenerators;

use ReflectionAttribute;

class AttributesDocumentationGenerator implements AttributesDocGeneratorInterface
{

    public function __construct(private \ReflectionProperty $property)
    {
    }

    public function generate(): string
    {
        $attributeLine = $this->property->getName();
        return sprintf('<div>%s</div><div>%s</div>', $attributeLine, $this->property->getDocComment());
    }
}