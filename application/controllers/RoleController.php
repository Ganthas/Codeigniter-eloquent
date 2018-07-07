<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RoleController extends CI_Controller
{
    public function index()
    {
        $list = RoleWrapper::getAllRoles();
        Utils::debugArray($list);
        $data['list'] = $list;
        $this->layout->view('home/index', $data);
    }
}
