<?php

declare(strict_types=1);

namespace Intetics\MvcTask\Core;

class Render {
    public function view($view_filename, $data)
    {
        $data = (object) $data;
        include_once(sprintf("%s/views/%s.php", APP_ROOT, $view_filename));
    }
}