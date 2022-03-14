<?php
require_once('config.php');

// Insert,Update,Delete => Không trả về kết quả
function excute($sql){
    //Create connection to Database
    $conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
    //Query
    mysqli_query($conn,$sql);
    //Close connection 
    mysqli_close($conn);
}

// Select => Trả về kết quả
function excuteResult($sql){
    //Create connection to Database
    $conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
    //Query
    $result = mysqli_query($conn,$sql);
    $list = [];
    // Browse each element in the array and assign it to a row
    while($row = mysqli_fetch_array($result)){
        // Add each row to the list
        $list[] = $row;
    }
    //Close connection 
    mysqli_close($conn);
    return $list;
}

?>