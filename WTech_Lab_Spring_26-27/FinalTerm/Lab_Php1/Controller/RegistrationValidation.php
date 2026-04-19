<?php 

$name="";
$email ="";
$website = "";
$comment = "";
$Gender = "";


if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name = $_POST["name"];
        $email= $_POST["email"];
        $website= $_POST["website"];
        $comment= $_POST["comment"];



        if(!empty($name) && strlen($name)>=5)
            {
                echo "Name: ".$name."<br>";
            }
            else
            {
                echo "Name must be greater than 5 character<br>";
            }

            
            if (!preg_match("/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/i", $email)) 

             {
              echo "Invalid email format<br>";
             }
            else
            {
               echo "email: ".$email ."<br>";
              
            }


             if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website))
                 {
                    echo "Invalid URL<br>";
                 }
            else
            {
               echo "Website: ".$website."<br>";
            }


            if(!empty($comment))
           {
             echo "Comment: " . $comment . "<br>";
           }
           else
            {
                echo "Feilds need to be filled<br>";
            }

         $Gender = $_POST["gender"] ?? ''; 

             if(!empty($Gender))
           {
             echo "Gender: " .$Gender . "<br>";
           }
           else
            {
                echo "Feilds need to be filled<br>";
            }




    }






?>