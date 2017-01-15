<?php

return [
    'routes' => [
        '^/hello$' => 'hello.html',
        '^/hello' => 'hello.html',
        '.+' => 'index.html',
    ]
];