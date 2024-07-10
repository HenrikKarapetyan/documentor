<?php

namespace Henrik\Documentor\DocHtmlGenerators;

use Henrik\Documentor\Utils\DocParser;

class ClassOrInterfaceHeaderLineDocGenerator implements GeneratorInterface
{
    public function __construct(
        private readonly string $classNameLine,
        private readonly ?string $doc
    ){}

    public function generate(): string
    {
        $parsedDoc = '';
        if ($this->doc){
            $doc = new DocParser();
            $parsedDoc = $doc->parse($this->doc);
        }
        $doc = '<section id="section-1">
                            <h4 class="section-title-6 text-green">%s</h4>
                            <p>%s</p>
                        </section>';
        return sprintf($doc, $this->classNameLine, $parsedDoc);
    }
}