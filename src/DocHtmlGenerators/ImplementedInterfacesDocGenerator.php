<?php

namespace Henrik\Documentor\DocHtmlGenerators;

readonly class ImplementedInterfacesDocGenerator implements GeneratorInterface
{


    public function __construct(private array $interfaceNames)
    {
    }

    public function generate(): string
    {

        $mainTemplate = '<section id="section-2">
                            <h2 class="section-title-2">Implemented Interfaces</h2>
                            <div class="row">
                                <div class="col-md-12 col-xxl-4">
                                    <ul class="list-group list-group-lines">
                                    %s
                                    </ul>
                                </div>
                            </div>
                        </section>';

        $itemTemplate = ' <li class="list-group-item d-flex align-items-center">
                          <i class="icon-interface mr-2 text-primary fs-24"></i>
                             %s
                          </li>';
        $interfacesString = '';
        foreach ($this->interfaceNames as $interfaceName) {
            $interfacesString .= sprintf($itemTemplate, $interfaceName);
        }
        return sprintf($mainTemplate, $interfacesString);
    }
}