<?php

class Template extends Loader {

    public function render($view, $data = false) {
        $this->view($view, $data);
    }

}
