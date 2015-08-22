<?php
class Shorty_model extends CI_Model {
    
        var $url ='';
        var $shortlink ='';

        function __construct()
        {      
                parent::__construct();
                $this->load->database();
        }
    
        function get_all_entries()
        {
                $query = $this->db->get('shorty');
                return $query->result_array(); 
        }

        private function get_shortlink_entry($shortlink)
        {
                $query = $this->db->query("SELECT * FROM `shorty` WHERE `shortlink` = '$shortlink'");
                return $query;
        }

        public function shorten($url) 
        {
                $shortlink = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789',5)),0,5);
                if ($this->link_already_there($shortlink)) {shorten($url);}
                return $shortlink;
        }

        public function send_to_target($shortlink) 
        {
                $query = $this->get_shortlink_entry($shortlink);

                if ( $query->num_rows() > 0 )  
                {
                        # shortlink exists in DB
                        $this->load->helper('url');
                        $url = $query->row()->url;
                        
                        # redirecting to the real url
                        redirect($url, 'location', 301);
                }                
                else
                {
                        # shortlink not in DB
                        return false;            
                }
        }

        public function sanitize_input()
        {
                $this->load->helper('url');

                # redirect to start when empty
                if ($this->input->post('url') == "") 
                { 
                        redirect("/", 'location', 301);
                }
                
                $url = html_escape($this->input->post('url'));

                # prepend http:// if not present
                $url = prep_url($url);

                return $url;
        }

        private function link_already_there($shortlink)
        {
                # see if link is already present in database
                $query = $this->get_shortlink_entry($shortlink);
        
                if ( $query->num_rows() > 0 ) 
                {
                        # we have > 0 rows, so the shortlink / link is already present
                        return true;
                } 
                else
                { 
                        # we have 0 result rows, the link is new
                        return false;
                }       
        }

        public function save_shorty($url, $shortlink) 
        {
                if ( !$this->link_already_there($shortlink) ) 
                {
                        $data = array(
                        'url' => $url,
                        'shortlink' => $shortlink
                        );
        
                        return $this->db->insert('shorty', $data); 
                }
        }
}?>
