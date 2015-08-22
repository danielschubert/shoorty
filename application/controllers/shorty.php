<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shorty extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('shorty_model');
        }

	public function index()
	{
                $this->load->view('shorty/header');
                
                # load helpers
                $this->load->helper(array('form', 'url'));
                $this->load->library('form_validation');
            
                if ($sl = $this->input->get('sl', TRUE))
                {
                        # very basic check whether shortlink ist valid 
                        if ( !is_numeric($sl) ) 
                        {
                                $this->load->view('shorty/invalid');
                        }

                        # Redirect to the shortlinks' destination
                        elseif ( !$this->shorty_model->send_to_target($sl) )
                        {
                                # show redirect error page
                                $this->load->view('shorty/redirect-fault'); 
                        }
                } 
                else 
                {
                        $this->load->view('shorty');
                }
      
                $this->load->view('shorty/footer');
        }
        

        public function shorten()
        {    
                $this->load->view('shorty/header');
                
                $url = $this->shorty_model->sanitize_input();
                $shortlink = $this->shorty_model->shorten($url);
                $this->shorty_model->save_shorty($url, $shortlink);

                $data['sl'] = $shortlink;
                $data['url'] = $url;
                
                $this->load->view('shorty/success', $data);
                $this->load->view('shorty/footer');
        }
        
        ## redirection for shortlink
        public function r($sl)
        {
                $this->shorty_model->send_to_target($sl); 
        }
}

