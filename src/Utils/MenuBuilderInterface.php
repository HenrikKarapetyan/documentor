<?php

namespace Henrik\Documentor\Utils;

interface MenuBuilderInterface
{

    public function build():string;

    public function getName(): string;
}