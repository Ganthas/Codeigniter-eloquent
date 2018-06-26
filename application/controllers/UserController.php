<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends CI_Controller
{
    public function index()
    {
        $list = UserWrapper::getAllUsers();

        $this->load->view('home/index', ['list' => $list]);
    }
}
