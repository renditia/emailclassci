<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EmailClass extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->library('email');
    }

    // function send mail
    public function sendMail()
    {       
        // config email
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'webprogbkmphp@gmail.com',
            'smtp_pass' => 'G7b26B4d',
            'mailtype'  => 'html', 
            'wordwrap' => TRUE,
            'charset'   => 'iso-8859-1'
        );

        // initialization
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        // from email (email sender, Sender Name)
        $this->email->from('webprogbkmphp@gmail.com', 'Pratama.R'); // from email
        // send to 
        $this->email->to('logbookrendi@gmail.com');
        // subject email
        $this->email->subject('EMail Class CI');
        // Message
        $this->email->message('Assalamualaikum Email..');

        // send mail
        if($this->email->send()){
            echo 'Email sent.!';
        }
        else{
            show_error($this->email->print_debugger());
        }
    
    }
}
