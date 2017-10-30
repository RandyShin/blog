<?php
    $title = $_POST['title'];
    $body =  $_POST['body'];
    $slug =  $_POST['slug'];


$conn=mysqli_connect('localhost','root','ziotes135','blog');

//$sql = "INSERT INTO posts (title,body,slug) VALUES (".$title.", ".body.",".$slug.");";

$sql = "INSERT INTO posts (title,body,slug,created_at) VALUES ('".$title."','".$body."','".$slug."',now());";

    echo $sql;

$result=mysqli_query($conn,$sql);

//alert("작성이 되었습니다.");


$message = '완료';

function msg($message){
    echo "<script>";
    echo "alert('$message');";
    echo "location.href='/study/index.php';";
    echo "</script>";

}
msg($message);

//echo "<script>alert('작성되었습니다.')</script>";

//header('location: /study/index.php');