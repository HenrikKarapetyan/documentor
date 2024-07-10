<?php

namespace Henrik\Documentor\Utils;

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

    private const TEMPLATE = '<ul id="%s" class="nav flex-column nav-vertical-2">
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#menu-%s" role="button"
                           aria-expanded="true" aria-controls="menu-%s">%s</a>
                        <div class="show" id="menu-%s" data-parent="#%s">
                            <ul class="nav flex-column">
                               %s
                            </ul>
                        </div>
                    </li>
                </ul>';
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

    public function build(): string
    {
        $menuItemsLine = '';

        foreach ($this->menuItems as $menuItem) {
            $menuItemsLine .= $menuItem->build();
        }

        return sprintf(
            self::TEMPLATE,
            $this->menuName,
            $this->menuName,
            $this->menuName,
            $this->menuName,
            $this->menuName,
            $this->menuName,
            $menuItemsLine
        );
    }

    public function getName(): string
    {
        return $this->menuName;
    }
}