<?php

class Controller {

    public $load;
    public $template;
    public $url;

    public function __construct() {
        $this->load = new Loader();
        $this->template = new Template();
        $this->url = new Url();
    }

}
