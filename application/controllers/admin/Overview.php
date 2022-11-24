<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Overview extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->data['totalPendingAds'] = $this->m_admin->countPendingAds();
    }

    public function index()
    {
       echo "HELLO";
    }
    public function clear_history()
    {
        $this->m_admin->clear_history();
        redirect(site_url('/admin/overview'));
    }
}
