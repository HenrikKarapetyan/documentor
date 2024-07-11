<?php

namespace Henrik\Documentor\Utils;

interface DocCommentParserInterface
{
    public function parse(string $doc): string;
}