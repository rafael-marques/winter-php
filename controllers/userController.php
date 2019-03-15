<?php

namespace Controller;

use \System\Controller;

class UserController extends Controller
{
    public function index()
    {
    }

    public function list()
    {
        $this->load->language('user/user');
        $data['text_all_users'] = $this->load->text_all_users;
        $data['text_firstname'] = $this->load->text_firstname;
        $data['text_lastname'] = $this->load->text_lastname;
        $data['text_email'] = $this->load->text_email;
        $data['text_no_users'] = $this->load->text_no_users;

        $this->load->model('user/user');
        $data['user_count'] = $this->load->db->getUserCount();
        $data['users'] = $this->load->db->getUsers();
        
        $data ['header'] = $this->load->controller('header');

        $this->template->render('user/user_list', $data);

        $data ['footer'] = $this->load->controller('footer');
    }
}
