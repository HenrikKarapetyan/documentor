<?php
declare(strict_types=1);

/** @var Renderer $this */

use Henrik\View\Renderer;

/**@var string[] $interfaces */
?>
<?php if (!empty($interfaces)) { ?>
    <section id="section-2">
        <h2 class="section-title-2">Implemented Interfaces</h2>
        <div class="row">
            <div class="col-md-12 col-xxl-4">
                <ul class="list-group list-group-lines">
                    <?php

                    foreach ($interfaces as $interface) {
                        echo '<li class="list-group-item d-flex align-items-center">
                          <i class="icon-interface mr-2 text-primary fs-24"></i>
                             ' . $interface . '
                          </li>';
                    }

                    ?>
                </ul>
            </div>
        </div>
    </section>

<?php } ?>
