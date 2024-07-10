<?php

namespace Henrik\Documentor\DocHtmlGenerators;

use Henrik\Documentor\Utils\DocParser;
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
        $classDoc = $this->reflectionClass->getDocComment();
        if ($classDoc) {
            $doc = new DocParser();
            $parsedDoc = $doc->parse($classDoc);
            $this->docLine = (new ClassOrInterfaceHeaderLineDocGenerator($this->reflectionClass->getName(), $parsedDoc))->generate();
        }

        foreach ($this->reflectionClass->getProperties() as $property) {
            if ($property->isPublic()){
                $this->addAttributeDocGenerator(new PropertiesDocumentationGenerator($property));
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