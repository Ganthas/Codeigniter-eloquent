<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RoleController extends CI_Controller
{
    public function index()
    {

        $this->load->view('home/index', ['list' => $list]);
    }
}
