<?php
	var_dump($_POST);
    $data['file'] = $_FILES;
    $data['text'] = $_POST;
 
    echo json_encode($data);
?>