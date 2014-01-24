<?php
    require_once('model.php');
    require_once('view.php');
    
    $searchModel = new FlickrModel();
	$searchView = new FlickrMainView();
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$queryResult = $searchModel->getDataFromFlickr($_POST['search']);
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
	}
	
	// function showResults($query, $searchModel, $page=1) {
		// $queryResult = $searchModel->getDataFromFlickr($query,$page);
		// if($queryResult){
			// // Show the images
			// $searchView->renderImgListView($query, $searchModel);
		// } else {
			// // Show error message
		// }
	// }
?>