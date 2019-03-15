<?php

namespace Controller;

use \System\Controller;

class FooterController extends Controller
{

    public function index()
    {
        $this->load->language('general/footer');
        $data['footer_text'] = $this->load->footer_text;
        $this->template->render('footer', $data);
    }
}
