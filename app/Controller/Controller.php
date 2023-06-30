<?php

declare(strict_types=1);

namespace Intetics\MvcTask\Controller;

use Intetics\MvcTask\Core\Model;
use Intetics\MvcTask\Core\Render;

class Controller {

    protected $render;

    public function __construct(){
        $this->render = new Render();
    }

    public function load_model($model){
        $model_main = new Model();
        return $model_main->load_model($model);
    }
}
