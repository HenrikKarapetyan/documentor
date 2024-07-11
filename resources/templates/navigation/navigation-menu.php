<?php

declare(strict_types=1);

/** @var Renderer $this */

use Henrik\View\Renderer;

/**@var $menuItems string */
/**@var $menuName string */

?>

<ul id="<?php echo $menuName ?>" class="nav flex-column nav-vertical-2">
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#menu-<?php echo $menuName ?>" role="button"
           aria-expanded="true" aria-controls="menu-<?php echo $menuName ?>"><?php echo $menuName ?></a>
        <div class="show" id="menu-<?php echo $menuName ?>" data-parent="#<?php echo $menuName ?>">
            <ul class="nav flex-column">
                <?php echo $menuItems?>
            </ul>
        </div>
    </li>
</ul>
