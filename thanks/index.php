<?php

session_start();
 
$data = array(); 
foreach($_SESSION['data'] as $key=> $value) {
    
    echo '<pre>';
    echo $key[0] . $value;
    echo '</pre>';
    //$string = join(",", $value . "</br>");
    //array_push($data, $string);
    }

    echo '<span style="color:green;">Děkuji</span>';


?>