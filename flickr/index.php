<?php
    require_once('model.php');
    require_once('view.php');
    
    $searchModel = new FlickrModel();
    echo $searchModel->getDataFromFlickr('Paraguay');
    echo '<pre>';
    print_r($searchModel->getAllPhotos());
    echo '</pre>';
?>