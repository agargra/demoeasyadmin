<?php

use App\Kernel;

require_once __DIR__.'/../../../includes/symfony5/vendor/autoload_runtime.php';

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};