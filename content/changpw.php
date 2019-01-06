<?php  
    session_start();
    $user= $_SESSION['username'];
    $pw1 = $_POST["pw1"];  
    $pw2 = $_POST["pw2"];  
    $pw3 = $_POST["pw3"];
    $servername="localhost";
    $username="root";
    $password="123456";
    $dbname="user";
    if($pw2!=$pw3)
    {
        echo "<script>alert('两次输入的密码不一致！');history.go(-1);</script>";
        return 0;
    }
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    } 
    $sql = "select password from user where username = '$user';";  
    $result = mysqli_query($conn,$sql);  
    if($result->num_rows<=0)
    {
        echo "<script>alert('初始密码错误！');history.go(-1);</script>";
        return 0;
    }
    else if($result->num_rows>0)
    {
        while($row=$result->fetch_assoc())
        {
            if($pw1!=$row["password"])
            {
                echo "<script>alert('初始密码错误！');history.go(-1);</script>";
                return 0;
            }
        }
    }
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql2="update user set password='$pw2' where username='$user';";
    $result = mysqli_query($conn,$sql2);  
    echo "<script>alert('密码修改成功！');history.go(-1);</script>";
?>