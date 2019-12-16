<?php
defined('BASEPATH') or exit('No direct script access allowed');
class C_send extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect(base_url());
        }
        $this->load->library('email');
        // print_r($this->session);
    }

    public function index()
    {
        $this->load->view('v_send');
    }

    public function keluar()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function email()
    {
        $config = array(
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => $this->session->userdata('email'),
            'smtp_pass' => $this->session->userdata('password'),
            'mailtype'  => 'html',
            'charset'   => 'utf-8'
        );
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
        $this->email->to($this->input->post('email'));
        $this->email->from($this->session->userdata('email'), $this->session->userdata('name'));
        $this->email->subject($this->input->post('subject'));
        $this->email->message($this->input->post('konten'));
        //Send email
        // $this->email->send();
        $s = $this->email->send();
        if ($s) {
            $msg = array('stat' => 'sukses');
        } else {
            $msg = array('stat' => 'gagal');
        }
        // print_r($this->email);
        echo json_encode($msg);
    }
}

?>