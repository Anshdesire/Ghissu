<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {
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
