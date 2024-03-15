<?php 
    session_start();
    include('dbcon.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">

                <?php if(isset($_SESSION['message'])) : ?>
                    <h5 class="alert alert-success" ><?= $_SESSION['message']; ?></h5>
                <?php 
                    unset($_SESSION['message']);
                    endif; 

                
                ?>
                

                <div class="card">
                    <div class="card-header">
                        <h3>CRUD
                            <a href="add_student.php" class="btn btn-primary float-end" >Add STUDENT</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Fullname</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Course</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM users";
                                    $statement = $conn ->prepare($query);
                                    $statement ->execute();

                                    $result = $statement->fetchAll();
                                    if($result)
                                    {
                                        foreach($result as $row){
                                            echo "<tr>";
                                            echo "<td>" .$row["id"]. "</td>";
                                            echo "<td>" .$row["fullname"]. "</td>";
                                            echo "<td>" .$row["email"]. "</td>";
                                            echo "<td>" .$row["phone"]. "</td>";
                                            echo "<td>" .$row["course"]. "</td>";
                                            echo "<td><a href='student-edit.php?id=".$row["id"]."' class='btn btn-primary'>Edit</a></td>";
                                            echo "<td><form action='code.php' method='post'><button type='submit' name='delete_student' value='".$row["id"]."' class='btn btn-danger'>Delete</button></form></td>";
                                            echo "</tr>";

                                        }
                                    }
                                    else{
                                        echo "<tr><td colspan='7'>No Record Found</td></tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>