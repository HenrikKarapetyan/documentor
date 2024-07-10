<?php

use Henrik\Contracts\Enums\ServiceScope;
use Henrik\Documentor\Documentor;
use Henrik\Documentor\DocumentorInterface;

return [

    ServiceScope::SINGLETON->value => [

        [
            'id' => DocumentorInterface::class,
            'class' => Documentor::class,
            'params'=>[
                'outputDirectory' => __DIR__ . '/../docs',
                'namespace' => '\\Henrik\\Documentor',
                'excludeDirectories' => ['src/Exception']
            ]
        ]
    ]
];