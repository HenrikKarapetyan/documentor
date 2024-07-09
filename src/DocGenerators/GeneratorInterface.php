<?php

namespace Henrik\Documentor\DocGenerators;

interface GeneratorInterface
{

    /**
     * this is doing something
     *
     * @return string
     */
    public function generate(): string;

}