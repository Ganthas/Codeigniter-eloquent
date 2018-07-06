<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends CI_Controller
{
    public function index()
    {
        $list = UserWrapper::getAllUsers();
        Utils::debugArray($list);
        $data['list'] = $list;
        $this->layout->view('home/index', $data);
    }
}
