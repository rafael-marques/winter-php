<?php
namespace Controller\General;

use \System\Controller;

class HeaderController extends Controller
{
    public function index()
    {
        $this->load->language('general/header');

        $data['base_url'] = BASE;
        $data['sys_name'] = SYS_NAME;

        $data['text_home'] = $this->load->text_home;
        $data['text_user_list'] = $this->load->text_user_list;
        $data['user_list_href'] = $this->url->href('user/user', 'list');
        $this->load->view('general/header', $data);
    }
}
