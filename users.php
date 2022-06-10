<?php
include 'connect.php';
$sql="select*from `message`";
$result=mysqli_query($conn,$sql);







?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>users</title>
</head>
<body>
<button type="button" class="btn btn-secondary"><a href="dashbord.html" class="text-light">Dashboard</a></button>
<table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Body</th>
      <th scope="col">priority</th>
      <th scope="col">Type</th>
      <th scope="col">Opération</th>
    </tr>
  </thead>
  <tbody>
    
    <?php
    if($result){
        if($rows=mysqli_fetch_assoc($result)){
            while($rows=mysqli_fetch_assoc($result)){
                $id=$rows['id'];
                $name=$rows['name'];
                $message=$rows['body'];
                $priority=$rows['priority'];
                $type=$rows['type'];
                echo ' <tr>
                <th scope="row">'.$id.' </th>
                <td>'.$name.'</td>
                <td>'.$message.'</td>
                <td>'.$priority.'</td>
                <td>'.$type.'</td>
                <td>'.'<button type="button" class="btn btn-primary" ><a href="update.php?updateid='.$id.'" class="text-light">Update</a></button><button type="button" class="btn btn-danger"><a href="delete.php?deleteid='.$id.'" class="text-light">Delete</a></button>
                '.'</td>
              </tr>';
                
            }
        }
    }
    
    ?>
  </tbody>
</table>
</body>
</html>