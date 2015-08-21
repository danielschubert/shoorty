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

        public function shorten($url) 
        {
                ## creates crc32 checksum from url. 
                # $shortlink = rand(crc32($url);
                $shortlink = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789',5)),0,5);
                if ($this->link_already_there($shortlink)) {shorten($url);}
                return $shortlink;
        }

        public function send_to_target($shortlink) 
        {
                $query = $this->db->query("SELECT * FROM `shorty` WHERE `shortlink` = '$shortlink'");

                if ( $query->num_rows() > 0 )  
                {
                        $this->load->helper('url');
                        $url = $query->row()->url;
                        
                        # redirecting to the real url
                        redirect($url, 'location', 301);
                }                
                else
                {
                        return false;            
                }
        }

        public function sanitize_input()
        {
                $this->load->helper('url');
                # clean input from evil stuff
                $dirrty_url = $this->input->post('url');
                $dirrty_url = html_escape($dirrty_url);

                # prepend http:// if not present
                $url = prep_url($dirrty_url);

                return $url;
        }

        private function id_already_there($id)
        {
                # see if id is already present in database
                $query = $this->db->query(" SELECT * FROM `shorty` WHERE `id` = '$id' ");
        
                if ( $query->num_rows() > 0 ) 
                {
                        # we have > 0 rows, so the id  is already present
                        return true;
                } 
                else
                { 
                        # we have 0 result rows, the id is new
                        return false;
                }       
        }

        private function link_already_there($shortlink)
        {
                # see if link is already present in database
                $query = $this->db->query(" SELECT * FROM `shorty` WHERE `shortlink` = '$shortlink' ");
        
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
