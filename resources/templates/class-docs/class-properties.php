<?php
declare(strict_types=1);

/** @var Renderer $this */

use Henrik\View\Renderer;

/** @var ReflectionProperty[] $properties */
?>
<?php if (!empty($properties)) { ?>
    <section id="section-4">
        <h2 class="section-title-2">Properties</h2>
        <div class="row">
            <div class="col-md-12 col-xxl-4">
                <ul class="list-group list-group-lines">
                    <?php

                    foreach ($properties as $property) {
                        echo '<li class="list-group-item d-flex align-items-center">
                             Name: ' . $property->getName() . '</br>
                             Type: ' . $property->getType() . '</br>
                             DocComment: ' . $property->getDocComment() . '</br>
                          </li>';
                    }

                    ?>
                </ul>
            </div>
        </div>
    </section>
<?php } ?>