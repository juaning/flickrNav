<?php
    require_once('model.php');
    
    echo "It prints something";
    $searchModel = new FlickrModel();
    echo $searchModel->getDataFromFlickr('Paraguay');
    echo "Got it all";
    // echo $searchModel->getTotalResults();
    echo '<pre>';
    print_r($searchModel->getAllPhotos());
    echo '</pre>';
?>