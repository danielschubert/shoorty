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
            
                # validate form input
                // $this->form_validation->set_rules('url', 'Link', 'trim|required|xss_clean', 'callback_empty_url');
    
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
                        //   if ( $this->form_validation->run() === FALSE )
                        //   {
                        //           $this->load->view('shorty'); 
                        //       }                

                        #test ausgabe  
                        $data['shorty'] = $this->shorty_model->get_all_entries();	    
                        $this->load->view('shorty', $data);
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

# functions not implementet yet:

        # function for compressing output
        public function output(){
                $string = $this->output->get_output();
                $this->output->set_output("aaa");
        }
        
        # callback function for input validation
        public function empty_url($url)
        {
                if ($url == '')
                {
                        $this->form_validation->set_message('empty_url', 'Das Feld kann nicht leer sein!');
                        return FALSE;
                }
                else
                {
                        return TRUE;
                }
        }
}

