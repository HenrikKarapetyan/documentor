<?php

declare(strict_types=1);

/** @var Renderer $this */

use Henrik\View\Renderer;

?>
<html lang="en" class="cssmask skrollr skrollr-desktop" data-lt-installed="true">
<head>
    <title><?php echo $this->renderBlock('title'); ?></title>
    <?php echo $this->render('layout/_header.php'); ?>
</head>
<body data-spy="scroll" data-target="#toc" class="headroom headroom--not-bottom headroom--pinned headroom--top">
<section class="py-0">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <?php echo $this->render('layout/_navbar.php'); ?>

            <article class="col-lg-9 col-xxl-10 doc-content">

            <?php echo $this->renderBlock('content'); ?>

            </article>
        </div>
    </div>
</section>
<?php echo $this->render('layout/_footer.php'); ?>
</body>
</html>