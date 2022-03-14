<?php
require_once('dbhelper.php');
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $sql = "delete from student where id =".$id;
    excute($sql);
}
?>