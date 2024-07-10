<?php

namespace Henrik\Documentor;

use Henrik\View\Renderer;

/**
 *
 */
interface DocumentorInterface
{

    /**
     * @return void
     */
    public function makeDocumentation(): void;

    /**
     * @param string $outputDirectory
     * @return void
     */
    public function setOutputDirectory(string $outputDirectory): void;

    /**
     * @param string $directory
     * @return void
     */
    public function setSourcesDir(string $directory): void;

    /**
     * @return string
     */
    public function getSourcesDir(): string;

    /**
     * @param string $namespace
     * @return void
     */
    public function setNamespace(string $namespace): void;

    /**
     * @return string
     */
    public function getNamespace(): string;

    /**
     * @param string[] $excludeDirectories
     * @return void
     */
    public function setExcludeDirectories(array $excludeDirectories): void;

    /**
     * @return string[]
     */
    public function getExcludeDirectories(): array;

    /**
     * @param string $classOrInterface
     * @return string
     */
    public function generateDocumentationForClass(string $classOrInterface, Renderer $renderer): string;
}