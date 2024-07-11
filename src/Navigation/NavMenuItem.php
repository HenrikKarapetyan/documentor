<?php

namespace Henrik\Documentor\Navigation;

use Henrik\View\Renderer;

class NavMenuItem implements MenuBuilderInterface
{

    public function __construct(
        private readonly string        $url,
        private readonly string        $name,
        private readonly MenuItemTypes $type
    )
    {
    }

    public function build(Renderer $renderer): string
    {
        return $renderer->render(
            'navigation/navigation-menu-item',
            [
                'url' => $this->url,
                'icon' => $this->getIcon($this->type),
                'color' => $this->getColorByItemType($this->type),
                'name' => $this->name
            ]
        );
    }

    public function getName(): string
    {
        return $this->name;
    }


    public function getColorByItemType(MenuItemTypes $type): string
    {
        return match ($type) {
            MenuItemTypes::CLASS_TYPE => 'facebook',
            MenuItemTypes::INTERFACE_TYPE => 'green',
            MenuItemTypes::TRAIT_TYPE => 'cyan',
            MenuItemTypes::ENUM_TYPE => 'orange',
        };
    }


    private function getIcon(MenuItemTypes $type): string
    {
        return match ($type) {
            MenuItemTypes::CLASS_TYPE => 'icon-class',
            MenuItemTypes::INTERFACE_TYPE => 'icon-interface',
            MenuItemTypes::TRAIT_TYPE => 'icon-trait',
            MenuItemTypes::ENUM_TYPE => 'icon-enum',
        };
    }
}