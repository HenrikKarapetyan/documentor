<?php

namespace Henrik\Documentor;

use Henrik\View\Extension\AssetExtension;
use Henrik\View\Renderer;

class RendererFactory
{
    private string $viewsDirectory = __DIR__ . '/../resources/templates';
    private string $assetsBasePath = __DIR__ . '/../resources/assets';
    private string $assetBaseUrl   = 'assets';
    private string $appVersion     = '0.0.1';
    private string $appName        = 'App';

    public function getRenderer(): Renderer
    {
        $renderer = new Renderer(viewDirectory: $this->viewsDirectory);

        $assetExtension = new AssetExtension(basePath: $this->assetsBasePath, baseUrl: $this->assetBaseUrl);
        $renderer->addExtension($assetExtension);
        $renderer->addGlobal('appVersion', $this->appVersion);
        $renderer->addGlobal('appName', $this->appName);

        return $renderer;
    }

    public function getViewsDirectory(): string
    {
        return $this->viewsDirectory;
    }

    public function setViewsDirectory(string $viewsDirectory): void
    {
        $this->viewsDirectory = $viewsDirectory;
    }

    public function getAssetsBasePath(): string
    {
        return $this->assetsBasePath;
    }

    public function setAssetsBasePath(string $assetsBasePath): void
    {
        $this->assetsBasePath = $assetsBasePath;
    }

    public function getAssetBaseUrl(): string
    {
        return $this->assetBaseUrl;
    }

    public function setAssetBaseUrl(string $assetBaseUrl): void
    {
        $this->assetBaseUrl = $assetBaseUrl;
    }
}