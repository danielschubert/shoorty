<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shorty extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('shorty_model');
        }

	public function index()
	{
                $this->load->helper('url');
                $this->load->view('shorty/header');

                if ($sl = $this->input->get('sl', TRUE))
                {
                        if ( !is_numeric($sl) ) 
                        {
                            $this->load->view('shorty/invalid');
                        }
                
                        elseif ( !$this->shorty_model->redirect($sl) )
                        {
                            $this->load->view('shorty/invalid'); 
                        }
                } 
                else 
                {
                        #test ausgabe  
                        $data['shorty'] = $this->shorty_model->get_all_entries();	    
                        $this->load->view('shorty', $data);
                }
                
                $this->load->view('shorty/footer');
        }

        public function shorten()
        {    
                # load helpers
                $this->load->helper('form');
                $this->load->helper('url');
                $this->load->library('form_validation');
                
                # validate form input
                $this->form_validation->set_rules('url', 'Link', 'required');

                $this->load->view('shorty/header');

                if ($this->form_validation->run() === FALSE)
                {
                        $this->load->view('shorty/invalid'); 
                }
                else
                {
                        $url = $this->shorty_model->check_input();
                        $shortlink = $this->shorty_model->shorten($url);
                      
                        $this->shorty_model->save_shorty($url, $shortlink);

                        $data['sl'] = $shortlink;
                        $data['url'] = $url;
                        
                        $this->load->view('shorty/success', $data);
                }

                $this->load->view('shorty/footer');
        }

        public function output(){
              $string = $this->output->get_output();
              $this->output->set_output("aaa");
        }

}

