<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
    /**
     * Flick Nav main controller
	 * @author Ian Mignaco
	 * @date 9-05-2013
     */
    class Main extends CI_Controller {
        
        function __construct() {
            parent::__construct();
        }
		
		function index(){
			$viewData = array('page_title' => 'Flickr Nav');
			$this->load->view('main_view', $viewData);
		}
		
		function query(){
			$data = $this->input->post(NULL,true);
			$this->load->model('query_model');
			$saveData = array('query' => $data['query']
							, 'cc' => 1
							, 'location' => null
							);
			
			if(isset($data['location'])){
				$saveData['location'] = $data['location'];
			}
			
			$query_id = 0;
			if($query_id = $this->query_model->save($saveData)){
				//TODO: Get data from flickr
				$this->load->model('image_model');
				$imgData = array(array('url' => 'some.com'
									, 'title' => 'ye'
									, 'creator' => 'sean'
									, 'location' => 'da'
									, 'comments' => 'pol'
									),array('url' => 'else.com'
									, 'title' => 'ye'
									, 'creator' => 'sean'
									, 'location' => 'da'
									, 'comments' => 'pol'));
				if(!$this->image_model->save($query_id,$imgData)) return false;
				echo 'Saved: ' . $query_id . ' and everything went better than expected';
			}else{
				show_error('Cannot save data to db');
			}
		}
    }
    
?>