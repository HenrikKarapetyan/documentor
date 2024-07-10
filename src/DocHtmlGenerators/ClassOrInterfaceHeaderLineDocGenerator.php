<?php

namespace Henrik\Documentor\DocHtmlGenerators;

class ClassOrInterfaceHeaderLineDocGenerator implements GeneratorInterface
{


    public function __construct(
        private readonly string $classNameLine,

        private readonly string $doc
    )
    {
    }

    public function generate(): string
    {
        $doc = '<section id="section-1">
                            <h2 class="section-title-2 text-green">%s</h2>
                            <p>%s</p>
                        </section>';
        return sprintf($doc, $this->classNameLine, $this->doc);
    }
}