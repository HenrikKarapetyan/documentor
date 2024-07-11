<?php
declare(strict_types=1);

/** @var Renderer $this */

use Henrik\View\Renderer;

/**@var $url string */
/**@var $name string */
/**@var $icon string */

?>

<li class="nav-item">
    <a class="nav-link" href="<?php echo $url ?>"><i class="<?php echo $icon ?>>"></i> <?php echo $name ?></a>
</li>
