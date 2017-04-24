<?php
    require('Request.php');
    require('Response.php');
    //request
    $data = Request::getRequest();
    //response
    Response::sendResponse($data);
?>
