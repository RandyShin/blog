<?php
    $title = $_POST['title'];
    $body = $_POST['body'];
    echo "<br>";
$conn=mysqli_connect('localhost','root','','blog');

$sql='INSERT INTO posts (title,body) VALUE ("".$title."", "".$body."")';
echo $sql;

