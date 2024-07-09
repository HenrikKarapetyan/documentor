<?php

namespace Henrik\Documentor;

use Henrik\Documentor\DocGenerators\ClassDocGenerator;
use Henrik\Documentor\Utils\NavbarBuilder;
use Henrik\Filesystem\Filesystem;
use ReflectionClass;

class Documentor implements DocumentorInterface
{

    private string $sourcesDir = 'src';

    /**
     * @var string[]
     */
    private array $excludeDirectories = [];

    private string $namespace = '';

    public function __construct(){}

    private string $outputDirectory;

    public function makeDocumentation(): void
    {
        $classes = Filesystem::getPhpClassesFromDirectory($this->getSourcesDir(), $this->getNamespace(), $this->getExcludeDirectories());


        $this->createIndexFileAndCopyResources($classes);

        foreach ($classes as $class) {
            $classDir = str_replace('\\', DIRECTORY_SEPARATOR, $class);


            $baseUrl = str_repeat('../',count(explode('/', $classDir))-2);
            $rendererFactory = new RendererFactory();
            $rendererFactory->setAssetBaseUrl($baseUrl.'assets');

            $renderer = $rendererFactory->getRenderer();

            $renderer->addGlobal('baseUrl', $baseUrl.'index.html');


            $navbarBuilder = new NavbarBuilder($classes);
            $navbarBuilder->setComputeMenuDeep(true);

            $navMenus = $navbarBuilder->build();
            $renderer->addGlobal('navMenus', $navMenus);

            $content = $this->generateDocumentationForClass($class);
            $pageContent = $renderer->render('main-page', ['content' => $content]);
            Filesystem::createFile(path: $this->outputDirectory . $classDir . '.html', content: $pageContent);
        }

    }


    public function generateDocumentationForClass(string $classOrInterface): string
    {
        $reflectionClass = new ReflectionClass($classOrInterface);

        return (new ClassDocGenerator($reflectionClass))->generate();
    }

    /**
     * {@inheritDoc}
     */
    public function setOutputDirectory(string $outputDirectory): void
    {
        Filesystem::mkdir($outputDirectory);
        $this->outputDirectory = $outputDirectory;
    }

    /**
     * {@inheritDoc}
     */
    public function setSourcesDir(string $directory): void
    {
        $this->sourcesDir = $directory;
    }

    /**
     * {@inheritDoc}
     */
    public function getSourcesDir(): string
    {
        return $this->sourcesDir;
    }

    /**
     * {@inheritDoc}
     */
    public function setNamespace(string $namespace): void
    {
        $this->namespace = $namespace;
    }

    /**
     * {@inheritDoc}
     */
    public function getNamespace(): string
    {
        return $this->namespace;
    }

    /**
     * {@inheritDoc}
     */
    public function setExcludeDirectories(array $excludeDirectories): void
    {
        $this->excludeDirectories = $excludeDirectories;
    }

    /**
     * {@inheritDoc}
     */
    public function getExcludeDirectories(): array
    {
        return $this->excludeDirectories;
    }

    /**
     * @param string[] $classes
     * @return void
     * @throws \Henrik\Contracts\Filesystem\FileSystemExceptionInterface
     * @throws \Throwable
     */
    private function createIndexFileAndCopyResources(array $classes): void
    {
        $renderer = (new RendererFactory())->getRenderer();
        Filesystem::deleteDirectory($this->outputDirectory);
        Filesystem::mkdir($this->outputDirectory);

        $navMenus = (new NavbarBuilder($classes))->build();
        $renderer->addGlobal('navMenus', $navMenus);
        $renderer->addGlobal('baseUrl', 'index.html');

        $pageContent = $renderer->render('main-page',['content'=>'sdsd']);
        Filesystem::copyDirectory(__DIR__ . '/../resources/assets', $this->outputDirectory . '/assets');
        Filesystem::createFile(path: $this->outputDirectory . '/index.html', content: $pageContent);

    }

}