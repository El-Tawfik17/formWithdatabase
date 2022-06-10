 <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.min.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <title>Document</title>
  </head>
  <body>
      
  
  
   <?php
  $name = $_POST["name"];
  $message =$_POST["message"];
  $priority=$_POST["priority"];
  $type=$_POST["type"];
  $terms=$_POST["terms"];
   
  $priority=filter_input(INPUT_POST,"priority",FILTER_VALIDATE_INT);
  $type=filter_input(INPUT_POST,"type",FILTER_VALIDATE_INT);
  $terms=filter_input(INPUT_POST,"terms",FILTER_VALIDATE_BOOL);
  if(!$terms){
      die("terms must be accepted");

  }
   include 'connect.php'; 
  
  $sql = " INSERT INTO message (name,body,type,priority)
  VALUES(?,?,?,?)";
  
  $stmt = mysqli_stmt_init($conn);
 if( !mysqli_stmt_prepare($stmt,$sql)){
     die(mysqli_error($conn));  
 }
 mysqli_stmt_bind_param($stmt,"ssii",
 $name,
 $message,
 $type,
 $priority
 );
 
 mysqli_stmt_execute($stmt);
 
  echo"<div> <strong>Nom:</strong> $name </div>
  <div> <strong>Message:</strong> <p>$message</p></div>
  <button type=\"button\" class=\"btn btn-primary\"><a href=\"update.php?updna=$name&updme=$message \" class=\" text-light\"> Update</a></button>
  <button type=\"button\" class=\"btn btn-danger\"><a href=\"delete.php?delna=$name&delme=$message\"  class=\"text-light\">Delete</a></button>
  
 ";
  ?>
  
  
  </body>
  </html>

  
  
  