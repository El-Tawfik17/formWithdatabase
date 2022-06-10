<?php
include 'connect.php';
if($_GET['updateid']){
    $id=$_GET['updateid'];
    $sql="SELECT*FROM `message` WHERE id=$id";

}
if (isset($_GET['updna'])&&isset($_GET['updme'])) {
    $updna=$_GET['updna'];
    $updme=$_GET['updme'];
    $sql="SELECT*FROM `message` WHERE name='$updna' AND body='$updme'";
     
}


$result=mysqli_query($conn,$sql);
// if($result){
//     // echo'select successfully!!!';

// }
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$message=$row['body'];
$id=$row['id'];

if(isset($_POST['submit'])){
    // die($id);
  $name = $_POST['name'];
  $message =$_POST['message'];
  $priority=$_POST['priority'];
  $type=$_POST['type'];
  $terms=$_POST['terms'];
//die("everythings are okay!!");
  $priority=filter_input(INPUT_POST,"priority",FILTER_VALIDATE_INT);
  $type=filter_input(INPUT_POST,"type",FILTER_VALIDATE_INT);
  $terms=filter_input(INPUT_POST,"terms",FILTER_VALIDATE_BOOL);
  $sql="update `message` set id=$id,name='$name',body='$message',priority=$priority,type=$type  where `message`.`id`=$id";
//   $sql="update from `message` set `id`=$id,`name`='$name',`body`='$message',`priority`=$priority,`type`=$type,`term`=$terms where `message`.`id`=$id";
  $result=mysqli_query($conn,$sql);
  if($result){
      header('location:users.php');
  }


}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.min.css">
    <title>Contact_form</title>
</head>
<body>
    <h1>Contact</h1>
    <form method="POST">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>">
        <label for="message">Message</label>
        <textarea id="message" name="message"><?php echo $message; ?></textarea>
        <label for="priority">Priority</label>
        <select id="priority" name="priority">
            <option value="1">Low</option>
            <option value="2" selected>Meduim</option>
            <option value="3">High</option>
        </select>
        <fieldset>
            <legend>Type</legend>
            <label for="">
                <input type="radio" name="type" value="1" checked>
                Complaint
            </label>
            <br>
            <label for="">
                <input type="radio" name="type" value="2">
                Suggestion
            </label>
            
        </fieldset>
        <label for="">
            <input type="checkbox" name="terms">
        I agree to the terms and conditions
        </label>
        <br>
        <button name="submit"> Send </button>
    </form>
</body>
</html>