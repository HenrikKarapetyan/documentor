<?php

namespace Henrik\Documentor\DocGenerators;

use ReflectionClass;

class ClassDocGenerator implements GeneratorInterface
{

    /**
     * @var GeneratorInterface[]
     */
    private array $attributesDocGenerators = [];

    private array $methodDocGenerators = [];

    private string $docLine = '';

    public function __construct(private ReflectionClass $reflectionClass)
    {
        if ($this->reflectionClass->getDocComment()) {
            $this->docLine = (new ClassOrInterfaceHeaderLineDocGenerator($this->reflectionClass->getName(), $this->reflectionClass->getDocComment()))->generate();
        }

        foreach ($this->reflectionClass->getProperties() as $property) {
            if ($property->isPublic()){
                $this->addAttributeDocGenerator(new AttributesDocumentationGenerator($property));
            }
        }
    }

    public function generate(): string
    {

        foreach ($this->attributesDocGenerators as $attributesDocGenerator) {
            $this->docLine.= $attributesDocGenerator->generate();
        }

        foreach ($this->methodDocGenerators as $methodDocGenerator) {
            $this->docLine.= $methodDocGenerator->generate();
        }

        return $this->docLine;
    }

    public function addAttributeDocGenerator(AttributesDocumentationGenerator $generator): void
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
    public function addMethodDocGenerator(MethodsDocumentationGenerator $generator): void{
        $this->methodDocGenerators[] = $generator;
    }

    /**
     * @return array
     */
    public function getMethodDocGenerators(): array{
        return $this->methodDocGenerators;
    }

}