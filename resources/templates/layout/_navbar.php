<?php
declare(strict_types=1);

use Henrik\View\Renderer;


/** @var Renderer $this */

/**@var string $navMenus */
/**@var string $baseUrl */
/**@var string $appVersion */
/**@var string $appName */

?>
<!-- navigation -->
<aside class="col-lg-3 col-xxl-2 p-3 doc-sidebar">
    <div class="sticky" style="">
        <nav class="navbar navbar-vertical navbar-expand-lg navbar-light">
            <div>
                <a href="<?php echo $baseUrl ?>" class="navbar-brand">
                    <img src="<?php echo $this->asset('images/logo.svg') ?>"
                         alt="Logo">
                    <span
                            class="ml-2"><?php echo $appName ?> <span class="badge badge-green"> Version: <?php echo  $appVersion ?></span></span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php echo $navMenus ?>
            </div>

        </nav>
    </div>
</aside>
<!-- / navigation -->

