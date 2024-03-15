<?php
try{
                $sql = "CREATE TABLE users(
                    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    fullname VARCHAR(255)  NOT NULL,
                    email VARCHAR(255) NOT NULL,
                    phone VARCHAR(255) NOT NULL,
                    course VARCHAR(255) NOT NULL
                    
                )";
                $conn->exec($sql);

                echo "table created succesfully";

            }catch(PDOException $e){
                die("error :" .$e->getMessage());
            }
?>