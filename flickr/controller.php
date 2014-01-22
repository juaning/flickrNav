<?php
	/**
	 * Main Controller
	 * @author Ian Mignaco
	 * @date 22-01-2014
	 * http://www.sitepoint.com/the-mvc-pattern-and-php-1/
	 * http://r.je/mvc-in-php.html
	 */
	class Main {
		
		private $api_key = '25190f391caa4b90f4e5f4266faa0826';
        
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
			// $api_key = '25190f391caa4b90f4e5f4266faa0826';
			$query = htmlspecialchars($query);
			if(isset($lat) && isset($lon)) $location = '&lat='.$lat.'&lon='.$lon.'&accuracy=6';
			else $location = '';
			$this->rest->initialize(array('server' => 'http://api.flickr.com/'));
			$rawImg = $this->rest->get('services/rest/?method=flickr.photos.search&api_key='.$this->api_key.'&text='.$query.$location);
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
		
		
    }
?>