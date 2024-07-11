<?php

namespace Henrik\Documentor\Utils;

use Henrik\View\Renderer;

interface MenuBuilderInterface
{

    public function build(Renderer $renderer):string;

    public function getName(): string;
}