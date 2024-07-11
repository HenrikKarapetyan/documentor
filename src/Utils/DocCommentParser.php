<?php

namespace Henrik\Documentor\Utils;

class DocCommentParser implements DocCommentParserInterface
{
    public function parse(string $doc): string
    {
        return $doc;
    }
}