<?php
    /**
	 * Flickr Nav View
	 * @author Ian Mignaco
	 * 22-01-2014
	 */
	class Template {
	    private $args;
	    private $file;
	
	    public function __get($name) {
	        return $this->args[$name];
	    }
	
	    public function __construct($file, $args = array()) {
	        $this->file = $file;
	        $this->args = $args;
	    }
	
	    public function render() {
	        include $this->file;
	    }
	}
	 
	class FlickrMainView {
		public function __construct(){
			
		}
		
		public function renderDefaultHomeView() {
			$this->view = new Template('views/mainView.php' , array(
								'title' => 'Search Images on Flickr'
								, 'messageCSS' => ''
								, 'messageText' => ''
								, 'form' => new Template('views/formView.php', array('searchTerm' => false))
								, 'content' => false
								, 'navigation' => false
								));
			$this->view->render();
		}
		
		public function renderImgListView($searchTerm,$photos) {
			$currentPage = $photos->getCurrentPage();
			$totalPages = $photos->getPages();
			$prev = $currentPage == 1 ? $currentPage : $currentPage - 1;
			$next = $currentPage == $totalPages ? $currentPage : $currentPage + 1;
			
			$this->view = new Template('views/mainView.php' , array(
									'title' => 'Search Images on Flickr - ' . $searchTerm
									, 'messageCSS' => 'success'
									, 'messageText' => 'Total results: ' . $photos->getTotalResults()
									, 'form' => new Template('views/formView.php', array('searchTerm' => $searchTerm))
									, 'content' => new Template('views/imageListView.php' , array('photoList' => $photos->getAllPhotos()))
									, 'navigation' => new Template('views/navigationView.php' , array('prevL' => $prev
																									, 'nextL' => $next
																									, 'first' => 1
																									, 'last' => $totalPages))
									));
			$this->view->render();
		}
	}
	
	class FlickrSingleImgView {
		
	}
	
?>