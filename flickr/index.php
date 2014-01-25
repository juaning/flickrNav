<?php
	/**
	 * Landing page of the site, acts as router
	 * @author Ian Mignaco
	 */
    require_once('model.php');
    require_once('view.php');
	
	function showResults($query, $searchView, $page=1) {
		$searchModel = new FlickrModel();
		$queryResult = $searchModel->getDataFromFlickr($query,$page);
		if($queryResult['success']){
			// Show the images
			$searchView->renderImgListView($query, $searchModel);
		} else {
			// Show error message
			$searchView->renderErrorMessageView($query,$queryResult['msg']);
		}
	}
    
	$searchView = new FlickrMainView();
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		showResults($_POST['search'], $searchView);
	} else {
		if(isset($_GET['nav']) && isset($_GET['search'])) {
			showResults($_GET['search'], $searchView, $_GET['nav']);
		} else if(isset($_GET['single'])) {
			// Show single image
		}else {
			$searchView->renderDefaultHomeView();
		}
	}
?>