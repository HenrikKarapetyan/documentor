<?php
declare(strict_types=1);

/** @var Renderer $this */

use Henrik\View\Renderer;

/** @var ReflectionMethod[] $methods */
?>
<?php if (!empty($methods)) { ?>
    <section id="section-5">
        <h2 class="section-title-2">Methods</h2>
        <div class="row">
            <div class="col-md-12 col-xxl-4">
                <ul class="list-group list-group-lines">
                    <?php

                    foreach ($methods as $method) {
                        $parametersLine = '';
                        foreach ($method->getParameters() as $param) {
                            $parametersLine .= $param->getName() . ' ';
                        }
                        echo '<li class="list-group-item d-flex align-items-center">
                             Name: ' . $method->getName() . '</br>
                             Return type: ' . $method->getReturnType() . '</br>
                             Doc comment: ' . $method->getDocComment() . '</br>
                             Number of parameters: ' . $method->getNumberOfParameters() . '</br>
                             Number of required parameters: ' . $method->getNumberOfRequiredParameters() . '</br>
                             Parameters: ' . $parametersLine . '</br>
                             
                          </li>';
                    }

                    ?>
                </ul>
            </div>
        </div>
    </section>
<?php } ?>