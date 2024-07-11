<?php

namespace Henrik\Documentor\Navigation;

use Henrik\View\Renderer;

class NavbarBuilder
{

    private NavMenu $rootMenu;

    /**
     * @param string[] $classesPath
     */
    public function __construct(private readonly array $classesPath)
    {
        $this->rootMenu = new NavMenu('Sources');
    }

    public function build(Renderer $renderer,string $menuRootDir = ''): string
    {
        foreach ($this->classesPath as $classPath) {

            $pathParts = explode('\\', ltrim($classPath, '\\'));

            $filename = array_pop($pathParts);

            $menu = $this->addIntoMenu($pathParts, $this->rootMenu);
            $url = str_replace("\\", DIRECTORY_SEPARATOR, ltrim($classPath, '\\')) . '.html';

            $type = $this->getMenuItemType($classPath);

            $menu->addMenuItem(new NavMenuItem($menuRootDir . $url, $filename, $type));
        }

        return $this->rootMenu->build($renderer);
    }

    private function addIntoMenu(array $pathParts, NavMenu $menu = null): ?NavMenu
    {
        if (empty($pathParts)) {
            return $menu;
        }
        $menuId = array_shift($pathParts);


        if ($menu->isExistsMenu($menuId)) {
            $existingMenu = $menu->getSubmenu($menuId);
            return $this->addIntoMenu($pathParts, $existingMenu);
        }

        $newMenu = new NavMenu($menuId);
        $menu->addMenuItem($newMenu);
        return $this->addIntoMenu($pathParts, $newMenu);

    }

    private function getMenuItemType(string $classPath): MenuItemTypes
    {
        if (interface_exists($classPath)) {
            return MenuItemTypes::INTERFACE_TYPE;
        }

        if (trait_exists($classPath)) {
            return MenuItemTypes::TRAIT_TYPE;
        }

        if (enum_exists($classPath)) {
            return MenuItemTypes::ENUM_TYPE;
        }
        return MenuItemTypes::CLASS_TYPE;
    }
}