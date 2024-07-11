<?php

namespace Henrik\Documentor\Utils;

use Henrik\View\Renderer;

/**
 * NavMenu
 */
class NavMenu implements MenuBuilderInterface
{

    /** @var NavMenu[] */
    private array $submenus = [];

    public function __construct(private readonly string $menuName)
    {
    }

    /**
     * @var MenuBuilderInterface[]
     */
    private array $menuItems = [];

    public function getMenuItems(): array
    {
        return $this->menuItems;
    }

    public function setMenuItems(array $menuItems): void
    {
        $this->menuItems = $menuItems;
    }

    public function isExistsMenu(string $menuId): bool
    {
        return isset($this->submenus[$menuId]);
    }

    public function getSubmenu(string $menuId): NavMenu
    {
        return $this->submenus[$menuId];
    }

    public function addMenuItem(MenuBuilderInterface $menuItem): void
    {
        if ($menuItem instanceof NavMenu) {
            $this->submenus[$menuItem->getName()] = $menuItem;
        }

        $this->menuItems[] = $menuItem;
    }

    public function build(Renderer $renderer): string
    {
        $menuItemsLine = '';

        foreach ($this->menuItems as $menuItem) {
            $menuItemsLine .= $menuItem->build($renderer);
        }

        return $renderer->render(
            'navigation/navigation-menu',
            [
                'menuItems' => $menuItemsLine,
                'menuName' => $this->menuName
            ]
        );
    }

    public function getName(): string
    {
        return $this->menuName;
    }
}