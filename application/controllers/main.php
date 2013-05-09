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
		
		function xml2array ( $xmlObject, $out = array () )
		{
		    foreach ( (array) $xmlObject as $index => $node )
		        $out[$index] = ( is_object ( $node ) ) ? $this->xml2array ( $node ) : $node;
		
		    return $out;
		}
		
		function createPhotoArray($photo){
			return array('url' => 'http://farm'.$photo['farm'].'.staticflickr.com/'.$photo['server']
								.'/'.$photo['id'].'_'.$photo['secret'].'_m.jpg'
				, 'title' => $photo['title']
				, 'creator' => $photo['owner']
				, 'comments' => ''
				);
		}
		
		function getDataFromFlickr($query=null,$lat=null,$lon=null){
			$api_key = '25190f391caa4b90f4e5f4266faa0826';
			$query = htmlspecialchars($query);
			if(isset($lat) && isset($lon)) $location = '&lat='.$lat.'&lon='.$lon.'&accuracy=6';
			else $location = '';
			$this->rest->initialize(array('server' => 'http://api.flickr.com/'));
			$rawImg = $this->rest->get('services/rest/?method=flickr.photos.search&api_key='.$api_key.'&text='.$query.$location);
			$photos = $this->xml2array($rawImg['photos']);
			$photo = $this->xml2array($photos['photo']);
			unset($photos);
			unset($rawImg);
			$proImg = array();
			foreach ($photo as $img) {
				$proImg[] = $this->createPhotoArray($img['@attributes']);
			}
			return $proImg;
		}
		
		function query(){
			$data = $this->input->post(NULL,true);
			$this->load->model('query_model');
			$saveData = array('query' => $data['query']
							, 'cc' => 1
							, 'lat' => null
							, 'lon' => null
							);
			
			if(isset($data['lon']) && isset($data['lat'])){
				$saveData['lat'] = $data['lat'];
				$saveData['lon'] = $data['lon'];
			}
			$query_id = 0;
			if($query_id = $this->query_model->save($saveData)){
				$this->load->model('image_model');
				$imgData = $this->getDataFromFlickr($saveData['query'],$saveData['lat'],$saveData['lon']);
				if(!$this->image_model->save($query_id,$imgData)) return false;
				//TODO: Add Images and pagination
				// $config = array();
		        // $config["base_url"] = base_url() . "main/";
		        // $config["total_rows"] = count($imgData);
		        // $config["per_page"] = 15;
		        // $config["uri_segment"] = 3;
		        // $this->pagination->initialize($config);
// 						
				// $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		        // $data["results"] = array_slice($imgData, $page, $config["per_page"]);
		        // $data["links"] = $this->pagination->create_links();
// 				
				// print_r($data);
				//TODO: Delete test images
				// echo "<br />";
				// for($i=0; $i<15; $i++){
					// if(($i % 3 == 0) && $i>0) echo "<br />";
					// echo '<img src="'.$imgData[$i]['url'].'" />';
				// }
			}else{
				echo 'Error on database';
			}
		}
    }
    
?>