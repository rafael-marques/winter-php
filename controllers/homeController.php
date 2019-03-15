<?php
namespace Controller;

use \System\Controller;

class HomeController extends Controller
{

    public function index()
    {

        $this->load->language('general/home');

        $data['text_hello'] = $this->load->text_hello;
        
        $data ['header'] = $this->load->controller('header');

        $this->template->render('home', $data);

        $data ['footer'] = $this->load->controller('footer');
    }
}
