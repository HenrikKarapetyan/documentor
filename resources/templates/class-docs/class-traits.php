<?php
declare(strict_types=1);

/** @var Renderer $this */

use Henrik\View\Renderer;

/** @var ReflectionClass[] $traits */
?>
<?php if (!empty($traits)) { ?>
    <section id="section-3">
        <h2 class="section-title-2">Traits</h2>
        <div class="row">
            <div class="col-md-12 col-xxl-4">
                <ul class="list-group list-group-lines">
                    <?php

                    foreach ($traits as $trait) {
                        echo '<li class="list-group-item d-flex align-items-center">
                             Name: ' . $trait->getName() . '</br>
                             DocComment: ' . $trait->getDocComment() . '</br>
                          </li>';
                    }

                    ?>
                </ul>
            </div>
        </div>
    </section>
<?php } ?>