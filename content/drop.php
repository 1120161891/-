<?php
    session_start();
    echo "<script>alert('文件删除成功！');</script>";
    $q=$_GET["q"];
    $user= $_SESSION['username'];
    $servername="localhost";
    $username="root";
    $password="123456";
    $database="file";
    $conn=new mysqli($servername,$username,$password,$database);
    $sql="delete from file where username='$user' and filepath='$q';";
    $sql2="delete from file where username='g' and filepath='$q';";
    if ($conn->query($sql) === TRUE) {
        echo "新记录插入成功";
    } 
    $conn=new mysqli($servername,$username,$password,$database);
    if ($conn->query($sql2) === TRUE) {
        echo "新记录插入成功";
    } 
?>