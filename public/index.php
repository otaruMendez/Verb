<?php

require '..' . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'Loader.php';
spl_autoload_register(function ($class_name) {
    Loader::autoload($class_name);
});

(new Verb())->run();