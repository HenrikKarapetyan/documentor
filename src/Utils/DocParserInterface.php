<?php

namespace Henrik\Documentor\Utils;

interface DocParserInterface
{

    public function parse(string $doc): string;
}