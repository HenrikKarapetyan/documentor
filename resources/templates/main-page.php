<?php

declare(strict_types=1);

/** @var Renderer $this */
/** @var string $menus */
use Henrik\View\Renderer;

$this->layout('layout/main-layout');
$this->block('title', 'Page Title');
?>

<?php

    if (isset($content)){
        echo $content;
    }else{
        echo '<p>Content</p>';
    }
?>

