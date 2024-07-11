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
                'name' => $this->name
            ]
        );
    }

    public function getName(): string
    {
        return $this->name;
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