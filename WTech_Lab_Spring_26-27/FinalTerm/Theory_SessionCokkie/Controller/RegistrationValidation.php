<?php 

session_start();

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
        $Gender= $_POST["Gender"];


        if(!empty($name) && strlen($name)>=5)
            {
                $_SESSION["name"] = $name;
                setcookie('name', $name, time()+3600, "/");
                echo "Name: ".$name."<br>";
            }
            else
            {
                echo "Please try again.<br>";
            }

            
            if (!preg_match("/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/i", $email)) 

             {
                echo "Only letters and white space allowed<br>";
             }
            else
            {
               $_SESSION["email"] = $email;
                setcookie('email', $email, time()+3600, "/");
                echo "Email: ".$email."<br>";
            
            }


             if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website))
            {
                echo "Invalid Website<br>";
            }
            else
            {
               $_SESSION["website"] = $website;
               setcookie('website', $website, time()+3600, "/");
               echo "Website: ".$website."<br>";
            }


            if(!empty($comment))
           {
            $_SESSION["comment"] = $comment;
             setcookie('comment', $comment, time()+3600, "/");
             echo "Comment: " . $comment . "<br>";
           }
           else
            {
                echo "Feilds need to be filled<br>";
            }

         $Gender = $_POST["Gender"] ?? ''; 

             if(!empty($Gender))
           {

             $_SESSION["Gender"] = $Gender;
             setcookie('Gender', $Gender, time()+3600, "/");
             echo "Gender: " .$Gender . "<br>";
           }
           else
            {
                echo "Feilds need to be filled<br>";
            }
    }



    






?>