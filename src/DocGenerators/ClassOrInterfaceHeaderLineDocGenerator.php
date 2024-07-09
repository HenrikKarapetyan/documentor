<?php

namespace Henrik\Documentor\DocGenerators;

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
        $doc = '<div class="row">
                    <div class="col">
                      <div class="card">
                        <div class="card-header no-border bg-white pb-0">
                          <ul class="nav nav-pills card-header-pills lavalamp" id="myTab" role="tablist"><div class="lavalamp-object ease" style="transition-duration: 0.2s; width: 70.9375px; height: 37px; transform: translate(2px, 2px);"></div><div class="lavalamp-object ease lavalamp-item" style="transition-duration: 0.2s; width: 70.9375px; height: 37px; transform: translate(2px, 2px);"></div>
                            <li class="nav-item lavalamp-item" style="z-index: 5; position: relative;">
                              <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">HTML</a>
                            </li>
                            <li class="nav-item lavalamp-item" style="z-index: 5; position: relative;">
                              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">CSS</a>
                            </li>
                          </ul>
                        </div>
                        <div class="card-body">
                          <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                              <div class="code-toolbar"><pre class="  language-markup"><code class="  language-markup"></code></pre><div class="toolbar"><div class="toolbar-item"><a>Copy</a></div></div></div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                              <div class="code-toolbar"><pre class="  language-css"><code class="  language-php"></code></pre><div class="toolbar"><div class="toolbar-item"><a>Copy</a></div></div></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>';
        return sprintf('<div class="row">
                    <div class="col">
                    <h4 class="text-green">%s</h4>%s
</div></div>', $this->classNameLine, $this->doc);
    }
}