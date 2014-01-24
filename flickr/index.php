<?php
    require_once('model.php');
    require_once('view.php');
	
	function showResults($query, $searchModel, $page=1) {
		$queryResult = $searchModel->getDataFromFlickr($query,$page);
		if($queryResult){
			// Show the images
			$searchView->renderImgListView($query, $searchModel);
		} else {
			// Show error message
		}
	}
    
    $searchModel = new FlickrModel();
	$searchView = new FlickrMainView();
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		// showResults($_POST['search'], $searchModel);
		$queryResult = $searchModel->getDataFromFlickr($_POST['search'],$page);
		if($queryResult){
			// Show the images
			$searchView->renderImgListView($_POST['search'], $searchModel);
		} else {
			// Show error message
		}
	} else {
		// if(isset($_GET('nav'))) {
			// showResults($_POST['search'], $searchModel, $_GET('nav'));
		// } else {
			// $searchView->renderDefaultHomeView();
		// }
		$searchView->renderDefaultHomeView();
	}
?>