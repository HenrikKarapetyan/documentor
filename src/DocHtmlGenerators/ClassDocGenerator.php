<?php

namespace Henrik\Documentor\DocHtmlGenerators;

use Henrik\View\Renderer;
use ReflectionClass;

class ClassDocGenerator implements GeneratorInterface
{

    private string $docLine;

    public function __construct(private readonly ReflectionClass $reflectionClass, private readonly Renderer $renderer)
    {
        $classDoc = $this->reflectionClass->getDocComment();

        $this->docLine = (new ClassOrInterfaceHeaderLineDocGenerator($this->renderer, $this->reflectionClass->getShortName(), $classDoc))->generate();
        $this->docLine .= (new ImplementedInterfacesDocGenerator($this->renderer, $this->reflectionClass->getInterfaceNames()))->generate();
        $this->docLine .= (new TraitsDocGenerator($this->renderer,$this->reflectionClass->getTraits()))->generate();
        $this->docLine .= (new PropertiesDocumentationGenerator($this->renderer, $this->reflectionClass->getProperties()))->generate();
        $this->docLine .= (new MethodsDocumentationGenerator($this->renderer, $this->reflectionClass->getMethods()))->generate();


    }

    public function generate(): string
    {
        return $this->docLine;
    }

}