<?php
declare(strict_types=1);

/** @var Renderer $this */

use Henrik\View\Renderer;

?>

<!-- footer -->
<footer class="bg-dark">
    <div class="container">
        <div class="row gutter-3">
            <div class="col-12 col-md-2">
                <a href=""><img src="<?php echo $this->asset('images/logo-white.svg')?>" alt="Logo"></a>
            </div>
            <div class="col-12 col-md-6 text-white">
                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua.</p>
                <div class="row">
                    <div class="col">
                        <ul class="list-group list-group-minimal">
                            <li class="list-group-item"><a href="" class="link">Product Help</a></li>
                            <li class="list-group-item"><a href="" class="link">Training Videos</a></li>
                            <li class="list-group-item"><a href="" class="link">Integrations</a></li>
                        </ul>
                    </div>
                    <div class="col">
                        <ul class="list-group list-group-minimal">
                            <li class="list-group-item"><a href="" class="link">REST API</a></li>
                            <li class="list-group-item"><a href="" class="link">Corporate</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-2 ml-auto text-md-right">
                <div class="dropdown">
                    <button class="btn btn-inverted btn-block dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        English
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">French</a>
                        <a class="dropdown-item" href="#">German</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- / footer -->


<script src="<?php echo $this->asset('js/vendor.min.js')?>"  type="application/javascript"></script>
<script src="<?php echo $this->asset('js/app.js')?>"  type="application/javascript"></script>
