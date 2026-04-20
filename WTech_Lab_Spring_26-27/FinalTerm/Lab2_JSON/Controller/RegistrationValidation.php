<?php 

session_start();

$name="";
$email ="";
$website = "";
$comment = "";
$Gender = "";
$datafile ="../data.json";



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

                  $formdata = array("Name"=>$name);

                if(file_exists($datafile))
                    {
                        $existdata = file_get_contents($datafile);
                        $tempdata = json_decode($existdata, true);
                    }
                    else{
                        $tempdata = array();
                    }

                    if(!is_array($tempdata))
                        {
                            $tempdata = array(); 
                        }
                    $tempdata [] = $formdata;
                    $jsondata = json_encode($tempdata, JSON_PRETTY_PRINT);
                if(file_put_contents($datafile,$jsondata)!== false)
                    {
                        echo "Data Saved";
                    }
                    else{
                        echo "Please Try Again";
                    }
                $data = file_get_contents($datafile);
                $mydata = json_decode($data);
            }
            else{
                echo "Please try again!";
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

                 $formdata = array("Email"=>$email);

                if(file_exists($datafile))
                    {
                        $existdata = file_get_contents($datafile);
                        $tempdata = json_decode($existdata, true);
                    }
                    else{
                        $tempdata = array();
                    }

                    if(!is_array($tempdata))
                        {
                            $tempdata = array(); 
                        }
                    $tempdata [] = $formdata;
                    $jsondata = json_encode($tempdata, JSON_PRETTY_PRINT);
                if(file_put_contents($datafile,$jsondata)!== false)
                    {
                        echo "Data Saved";
                    }
                    else{
                        echo "Please Try Again";
                    }
                $data = file_get_contents($datafile);
                $mydata = json_decode($data);
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

                 $formdata = array("Website"=>$website);

                if(file_exists($datafile))
                    {
                        $existdata = file_get_contents($datafile);
                        $tempdata = json_decode($existdata, true);
                    }
                    else{
                        $tempdata = array();
                    }

                    if(!is_array($tempdata))
                        {
                            $tempdata = array(); 
                        }
                    $tempdata [] = $formdata;
                    $jsondata = json_encode($tempdata, JSON_PRETTY_PRINT);
                if(file_put_contents($datafile,$jsondata)!== false)
                    {
                        echo "Data Saved";
                    }
                    else{
                        echo "Please Try Again";
                    }
                $data = file_get_contents($datafile);
                $mydata = json_decode($data);
            }
            



            if(!empty($comment))
           {
            $_SESSION["comment"] = $comment;
             setcookie('comment', $comment, time()+3600, "/");
             echo "Comment: " . $comment . "<br>";

               $formdata = array("Comment"=>$comment);

                if(file_exists($datafile))
                    {
                        $existdata = file_get_contents($datafile);
                        $tempdata = json_decode($existdata, true);
                    }
                    else{
                        $tempdata = array();
                    }

                    if(!is_array($tempdata))
                        {
                            $tempdata = array(); 
                        }
                    $tempdata [] = $formdata;
                    $jsondata = json_encode($tempdata, JSON_PRETTY_PRINT);
                if(file_put_contents($datafile,$jsondata)!== false)
                    {
                        echo "Data Saved";
                    }
                    else{
                        echo "Please Try Again";
                    }
                $data = file_get_contents($datafile);
                $mydata = json_decode($data);
            }
            else{
                echo "Please try again!";
            }
    }
        

         $Gender = $_POST["Gender"] ?? ''; 

             if(!empty($Gender))
           {

             $_SESSION["Gender"] = $Gender;
             setcookie('Gender', $Gender, time()+3600, "/");
             echo "Gender: " .$Gender . "<br>";

               $formdata = array("Gender"=>$Gender);

                if(file_exists($datafile))
                    {
                        $existdata = file_get_contents($datafile);
                        $tempdata = json_decode($existdata, true);
                    }
                    else{
                        $tempdata = array();
                    }

                    if(!is_array($tempdata))
                        {
                            $tempdata = array(); 
                        }
                    $tempdata [] = $formdata;
                    $jsondata = json_encode($tempdata, JSON_PRETTY_PRINT);
                if(file_put_contents($datafile,$jsondata)!== false)
                    {
                        echo "Data Saved";
                    }
                    else{
                        echo "Please Try Again";
                    }
                $data = file_get_contents($datafile);
                $mydata = json_decode($data);
            }
            else{
                echo "Feilds need to be filled<br>";
            }
    
if(isset($_SESSION["name"]) || isset($_COOKIE["name"]))
    {
        echo "Welcome Back";
    }
    else{
        echo "pLease log in agian!"; 
    }

?>