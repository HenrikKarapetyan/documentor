<?php

namespace Henrik\Documentor\DocHtmlGenerators;

use Henrik\View\Renderer;
use ReflectionClass;

class ClassDocGenerator implements GeneratorInterface
{

    /**
     * @var GeneratorInterface[]
     */
    private array $attributesDocGenerators = [];

    private array $methodDocGenerators = [];

    private string $docLine;

    public function __construct(private readonly ReflectionClass $reflectionClass, private readonly Renderer $renderer)
    {
        $classDoc = $this->reflectionClass->getDocComment();

        $this->docLine = (new ClassOrInterfaceHeaderLineDocGenerator($this->renderer, $this->reflectionClass->getShortName(), $classDoc))->generate();

        $this->docLine .= (new ImplementedInterfacesDocGenerator($this->renderer, $this->reflectionClass->getInterfaceNames()))->generate();

        $this->docLine .= (new PropertiesDocumentationGenerator($this->renderer, $this->reflectionClass->getProperties()))->generate();


    }

    public function generate(): string
    {

        foreach ($this->methodDocGenerators as $methodDocGenerator) {
            $this->docLine .= $methodDocGenerator->generate();
        }

        return $this->docLine;
    }

    public function addAttributeDocGenerator(PropertiesDocumentationGenerator $generator): void
    {
        $this->attributesDocGenerators[] = $generator;
    }

    /**
     * @return GeneratorInterface[]
     */
    public function getAttributesDocGenerators(): array
    {
        return $this->attributesDocGenerators;
    }

    /**
     * @param MethodsDocumentationGenerator $generator
     * @return void
     */
    public function addMethodDocGenerator(MethodsDocumentationGenerator $generator): void
    {
        $this->methodDocGenerators[] = $generator;
    }

    /**
     * @return array
     */
    public function getMethodDocGenerators(): array
    {
        return $this->methodDocGenerators;
    }

}