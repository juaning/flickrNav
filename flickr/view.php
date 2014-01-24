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
		
		public function printDefaultHomeView() {
			$view = new Template('views/mainView.php' , array(
								'title' => 'Search Images on Flickr'
								, 'messageCSS' => ''
								, 'messageText' => ''
								, 'form' => new Template('views/formView.php', array('searchTerm' => false))
								, 'content' => false
								));
			$view->render();
		}
	}
	
	class FlickrSingleImgView {
		
	}
	
?>