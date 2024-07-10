<?php

namespace Henrik\Documentor\Utils;

class NavMenuItem implements MenuBuilderInterface
{

    public function __construct(private readonly string $url, private readonly string $name, private readonly MenuItemTypes $type)
    {
    }


    private const TEMPLATE = '<li class="nav-item">
                                    <a class="nav-link" href="%s"><i class="%s"></i> %s</a>
                                </li>';
    public function build(): string
    {
        return sprintf(self::TEMPLATE,$this->url,$this->getIcon($this->type),$this->name);
    }

    public function getName(): string
    {
        return $this->name;
    }


    private function getIcon(MenuItemTypes $type){

        if ($type == MenuItemTypes::CLASS_TYPE){
            return 'icon-class';
        }

        if ($type == MenuItemTypes::INTERFACE_TYPE){
            return 'icon-interface';
        }
        if ($type == MenuItemTypes::TRAIT_TYPE){
            return 'icon-trait';
        }
        return 'icon-link';
    }
}