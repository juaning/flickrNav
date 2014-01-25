<?php
    /**
	 * Model for FlickrNav: manage the connection with flickr, and format results
	 * @author Ian Mignaco
	 */
	class FlickrModel {
		
		private $api_key = '25190f391caa4b90f4e5f4266faa0826';
		private $curlHandler;
		private $imgsData = array();
		private $arrCleanImgs = array();
		private $maxLengthTitle = 35;
        
      	public function __construct() {
        	$this->curlHandler = curl_init();
        	// Disable SSL verification
			curl_setopt($this->curlHandler, CURLOPT_SSL_VERIFYPEER, false);
			// Will return the response, if false it print the response
			curl_setopt($this->curlHandler, CURLOPT_RETURNTRANSFER, true);
        }
        
        public function __destruct() {
        	curl_close($this->curlHandler);
        }
		
		private function getPhotoData($photo){
			$photoUrl = 'http://farm'.$photo['farm'].'.staticflickr.com/'.$photo['server'].'/'.$photo['id'].'_'.$photo['secret'];
			return array('thumbnail' => $photoUrl.'_m.jpg'
				, 'large' => $photoUrl.'_b.jpg'
				, 'title' => $photo['title']
				, 'shortTitle' => substr($photo['title'], 0, $this->maxLengthTitle)
				, 'creator' => $photo['owner']
				, 'comments' => ''
				);
		}
		
		private function cleanPhotoResult($photos) {
			$cleanedPhotos = array();
			foreach($photos as $p){
				$cleanedPhotos[] = $this->getPhotoData($p);
			}
			$this->arrCleanImgs = $cleanedPhotos;
		}
		
		public function getDataFromFlickr($query=null,$page=1,$perPage=5){
			$query = htmlspecialchars($query);
			$getUrl = 'http://api.flickr.com/services/rest/?method=flickr.photos.search&format=json&nojsoncallback=1&sort=relevance&api_key='.$this->api_key.'&per_page='.$perPage.'&page='.$page.'&text='.$query;
			// Set the url
			curl_setopt($this->curlHandler, CURLOPT_URL,$getUrl);
			// Execute
			$result=curl_exec($this->curlHandler);
			$this->imgsData = json_decode($result, true);
			if($this->imgsData['stat'] === 'ok') {
				if($this->imgsData['photos']['total'] > 0){
					$this->cleanPhotoResult($this->imgsData['photos']['photo']);
					return array('success' => true);
				} else {
					return array('success' => false, 'msg' => 'No images for search criteria');
				}
			} else {
				return array('success' => false, 'msg' => 'There was an error with the API, please, try again later');
			}
		}
		
		public function getCurrentPage() {
			return $this->imgsData['photos']['page'];
		}
		
		public function getPages() {
			return $this->imgsData['photos']['pages'];
		}
		
		public function getTotalResults() {
			return $this->imgsData['photos']['total'];
		}
		
		public function getAllPhotos() {
			return $this->arrCleanImgs;
		}
		
		public function getPhotoById($id) {
			return $this->arrCleanImgs[$id];
		}
    }
?>