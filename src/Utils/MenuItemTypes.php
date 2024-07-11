<?php

namespace Henrik\Documentor\Utils;

enum MenuItemTypes: int
{
    case CLASS_TYPE = 0;
    case INTERFACE_TYPE = 1;
    case TRAIT_TYPE = 2;
    case ENUM_TYPE = 3;
}