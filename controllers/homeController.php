<?php

class homeController extends Controller {

    public function index() {

        $this->load->language('home');

        $data['text_total'] = $this->load->text_hello;
        
        $data ['header'] = $this->load->controller('header');

        $this->template->render('home', $data);

        $data ['footer'] = $this->load->controller('footer');
    }
}