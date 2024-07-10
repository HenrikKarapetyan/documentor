<?php

namespace Henrik\Documentor\DocHtmlGenerators;

use Henrik\Documentor\Utils\DocParser;
use Henrik\View\Renderer;

class ClassOrInterfaceHeaderLineDocGenerator extends DocViewGenerator
{
    public function __construct(
        Renderer $renderer,
        private readonly string $classNameLine,
        private readonly ?string $doc
    ){
        parent::__construct($renderer);
    }

    public function generate(): string
    {
        $parsedDoc = '';
        if ($this->doc){
            $doc = new DocParser();
            $parsedDoc = $doc->parse($this->doc);
        }
        return$this->renderer->render('class-docs/class-or-interface-header-line',['className' => $this->classNameLine, 'docLine'=> $parsedDoc]);
    }
}