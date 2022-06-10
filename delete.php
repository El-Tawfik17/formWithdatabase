<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql="delete from `message` where id=$id";
}

if (isset($_GET['delna'])&&isset($_GET['delme'])) {
    $delna=$_GET['delna'];
    $delme=$_GET['delme'];
    $sql="delete from `message` where name='$delna' and body='$delme'";
}


$result=mysqli_query($conn,$sql);

if($result){
    if(isset($_GET['deleteid'])){
        header('location:users.php');

    }else{
        header('dashbord.html');
    }
    
}else{
    die(mysqli_error($result));
}
?>