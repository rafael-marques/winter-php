<?php
namespace Controller\General;

use \System\Controller;

class HomeController extends Controller
{

    public function index()
    {

        $this->load->language('general/home');

        $data['text_hello'] = $this->load->text_hello;
        
        $data ['header'] = $this->load->controller('general/header');

        $this->template->render('general/home', $data);

        $data ['footer'] = $this->load->controller('general/footer');
    }
}
