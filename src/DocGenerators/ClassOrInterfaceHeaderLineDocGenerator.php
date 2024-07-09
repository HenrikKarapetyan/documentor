<?php

namespace Henrik\Documentor\DocGenerators;

class ClassOrInterfaceHeaderLineDocGenerator implements GeneratorInterface
{
    public function __construct(private string $classNameLine, private string $doc)
    {
    }

    public function generate(): string
    {
        return sprintf('<div>%s</div><div>%s</div>', $this->classNameLine, $this->doc);
    }
}