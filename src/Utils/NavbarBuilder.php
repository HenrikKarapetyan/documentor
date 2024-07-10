<?php

namespace Henrik\Documentor\Utils;

class NavbarBuilder
{

    private NavMenu $rootMenu;

    private bool $computeMenuDeep = false;

    /**
     * @param string[] $classesPath
     */
    public function __construct(private readonly array $classesPath)
    {
        $this->rootMenu = new NavMenu('Sources');
    }

    public function build(string $menuRootDir= ''): string
    {
        foreach ($this->classesPath as $classPath) {

            $pathParts = explode('\\', ltrim($classPath, '\\'));

            $filename = array_pop($pathParts);

            $menu = $this->addIntoMenu($pathParts, $this->rootMenu);
            $url = str_replace("\\", DIRECTORY_SEPARATOR, ltrim($classPath, '\\')).'.html';

            $type = MenuItemTypes::CLASS_TYPE;

            if (interface_exists($classPath)) {
                $type = MenuItemTypes::INTERFACE_TYPE;
            }

            if (trait_exists($classPath)){
                $type = MenuItemTypes::TRAIT_TYPE;
            }

            $menu->addMenuItem(new NavMenuItem($menuRootDir.$url, $filename, $type));
        }

        return $this->rootMenu->build();
    }

    private function addIntoMenu(array $pathParts, NavMenu $menu = null): ?NavMenu
    {
        $menuId = array_shift($pathParts);

        if (count($pathParts) === 0) {
            return $menu;
        }

        if ($menu->isExistsMenu($menuId)) {
            $existingMenu = $menu->getSubmenu($menuId);
            return $this->addIntoMenu($pathParts, $existingMenu);
        }

        $newMenu = new NavMenu($menuId);
        $menu->addMenuItem($newMenu);
        return $this->addIntoMenu($pathParts, $newMenu);

    }

    public function isComputeMenuDeep(): bool
    {
        return $this->computeMenuDeep;
    }

    public function setComputeMenuDeep(bool $computeMenuDeep): void
    {
        $this->computeMenuDeep = $computeMenuDeep;
    }
}