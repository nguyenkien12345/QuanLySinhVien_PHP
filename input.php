<?php
require_once("dbhelper.php");

$s_fullname = $s_age = $s_address = "";

if(!empty($_POST)){
    $s_id = "";
    if(isset($_POST['fullname'])){
        $s_fullname = $_POST['fullname'];
    }
    if(isset($_POST['age'])){
        $s_age = $_POST['age'];
    }
    if(isset($_POST['address'])){
        $s_address = $_POST['address'];
    }
    if(isset($_POST['id'])){
        $s_id = $_POST['id'];
    }
    $s_fullname = str_replace('\'','\\\'',$s_fullname);
    $s_age = str_replace('\'','\\\'',$s_age);
    $s_address = str_replace('\'','\\\'',$s_address);
    $s_id = str_replace('\'','\\\'',$s_id);
    if($s_id != ''){
        $sql = "update student set fullname = '$s_fullname', age = '$s_age', address = '$s_address' where id = ".$s_id;
    }
    else{
        $sql = "insert into student (fullname,age,address) values ('$s_fullname','$s_age','$s_address')";
    }
    excute($sql);
    header('Location: index.php');
    die();
}
// Hiển thị dữ liệu ra form để edit và update
$id = '';
if(isset($_GET['id'])){
    //Nếu ID tồn tại
    $id = $_GET['id'];
    $sql = 'select * from student where id ='.$id;
    $studentlist = excuteResult($sql);
    if($studentlist != null && count($studentlist) > 0){
        $std = $studentlist[0];
        $s_fullname = $std['fullname'];
        $s_age = $std['age'];
        $s_address = $std['address']; 
    }
    //Nếu ID không tồn tại
    else{
        $id = '';
    }
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Registation Form * Form Tutorial</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Add Student</h2>
			</div>
			<div class="panel-body">
            <form method="post">
				<div class="form-group">
				  <label for="fullname">Name:</label>
                  <input type="number" name="id" value="<?=$id?>" style="display: none;">
				  <input required="true" type="text" class="form-control" id="fullname" name="fullname" value="<?=$s_fullname?>">
				</div>
				<div class="form-group">
				  <label for="age">Age:</label>
				  <input required="true" type="number" class="form-control" id="age" name="age" value="<?=$s_age?>">
				</div>
				<div class="form-group">
				  <label for="address">Address:</label>
				  <input required="true" type="text" class="form-control" id="address" name="address" value="<?=$s_address?>">
				</div>
				<button class="btn btn-success">Save</button>
			</form>
            </div>
		</div>
	</div>
</body>
</html>