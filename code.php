<?php 
session_start();
include('dbcon.php');

if(isset($_POST['delete_student']))
{
    $student_id = $_POST['delete_student'];

    try{
        
        $query = "DELETE from users WHERE id=:stud_id";
        $statement = $conn->prepare($query);
        $data =[':stud_id' => $student_id];
        $query_execute = $statement->execute($data);

        if($query_execute)
            {
                $_SESSION['message'] = "Deleted Succesfully";
                header("location: index.php");
                exit;

            }
            else
            {
                $_SESSION['message'] = "Not Deleted";
                header("location: index.php");
                exit;
            }

    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
}

if(isset($_REQUEST['update_student_btn']))
{
    $student_id = $_REQUEST['student_id'];
    $fullname = $_REQUEST['fullname'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    $course = $_REQUEST['course'];

    try{
        $query="UPDATE users SET fullname=:fullname, email=:email, phone=:phone, course=:course WHERE id=:stud_id LIMIT 1";
        $statement = $conn->prepare($query);

        $data = [
            ':fullname' => $fullname,
            ':email' => $email,
            ':phone' => $phone,
            ':course' => $course,
            ':stud_id' => $student_id    
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
            {
                $_SESSION['message'] = "Updated Succesfully";
                header("location: index.php");
                exit;

            }
            else
            {
                $_SESSION['message'] = "Not Updated";
                header("location: index.php");
                exit;
            }

    }catch(PDOException $e){
    echo $e->getMessage();
}


}

if(isset($_REQUEST['save_student_btn']))
{
    $fullname = $_REQUEST['fullname'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    $course = $_REQUEST['course'];
    $query="INSERT INTO users(fullname, email, phone, course)
                    VALUES 
                        (:fullname, :email, :phone, :course)";
    $query_run = $conn->prepare($query);

    $data = [
        ':fullname' => $fullname,
        ':email' => $email,
        ':phone' => $phone,
        ':course' => $course,
    ];
    $query_execute = $query_run->execute($data);
    
    if($query_execute)
        {
            $_SESSION['message'] = "Inserted Succesfully";
            header("location: index.php");
            exit;

        }
        else
        {
            $_SESSION['message'] = "Not Inserted";
            header("location: index.php");
            exit;
        }

}



?>