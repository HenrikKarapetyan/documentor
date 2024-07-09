<?php

namespace Henrik\Documentor\Utils;

class NavMenuItem implements MenuBuilderInterface
{

    public function __construct(private readonly string $url, private readonly string $name)
    {
    }

    private const TEMPLATE = '<li class="nav-item">
                                    <a class="nav-link" href="%s">%s</a>
                                </li>';
    public function build(): string
    {
        return sprintf(self::TEMPLATE, $this->url, $this->name);
    }

    public function getName(): string
    {
        return $this->name;
    }
}