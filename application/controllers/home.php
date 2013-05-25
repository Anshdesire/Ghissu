<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {
     public function home(){ 
         parent::__construct();
        parse_str( $_SERVER['QUERY_STRING'], $_REQUEST );
        $CI = & get_instance();
        $CI->config->load("facebook",TRUE);
         $config = $CI->config->item('facebook');
          $this->load->library('Facebook', $config);
    }
 
    function index(){
        // Try to get the user's id on Facebook
        $userId = $this->facebook->getUser();
 
        // If user is not yet authenticated, the id will be zero
        if($userId == 0){
            // Generate a login url
            $data['url'] = $this->facebook->getLoginUrl(array('scope'=>'email'));
            $this->load->view('main_index', $data);
        } else {
            // Get user's data and print it
            $user = $this->facebook->api('/me');
            print_r($user);
        }
    }
     
    
    
	public function index()
	{
		$this->load->view('home_view');
	}
	function library()
	{         
		$this->load->database('default');
		$query ="SELECT* FROM crossword_data";
		$query = $this->db->query("SELECT* FROM crossword_data")or die ("Error in query: $query " . mysql_error()); 		
				while($query)
				{
					foreach ($query->result() as $row)
					{
					$data = array(
	               		'title' => "$row->title",
	               		'author' => "$row->author",
				   		'description' => "$row->description");
			         }
					 if (!$data)
					{
					 echo("Library empty");
					
					}
					 else 
					{
					$this->load->view('library_view.php',$data);
					}
				}
	}
	function book()
	{
		$isbn =  $this->input->get('isbn');
		$this->load->database('default');
		$data = 0;	
		$query = $this->db->query("SELECT * FROM crossword_data WHERE isbn LIKE '%".$isbn."%' OR id LIKE '%".$isbn."%'OR author LIKE '%".$isbn."%'")or die ("Error in query: $query " . mysql_error()); 
				foreach ($query->result() as $row)
				{
				$data = array(
               		'title' => "$row->title",
               		'author' => "$row->author",
			   		'image' => "$row->image",
		            'category' => "$row->category",
					'isbn' => "$row->isbn",
	               'description' => "$row->description",
       		       'publisher' => "$row->publisher",
	               'ean' => "$row->ean",
	               'binding' => "$row->binding",
    	           'language' => "$row->language",
              	   'numberofpages' => "$row->numberofpages");
		         }
				 if (!$data)
				{ 
				 $this->load->view('book1.php');
				
				}
				 else 
				{
				$this->load->view('book_view.php',$data);
				}
		}

}
