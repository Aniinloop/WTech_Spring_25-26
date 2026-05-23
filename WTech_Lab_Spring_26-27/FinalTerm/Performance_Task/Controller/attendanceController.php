<?php
include "../Model/db.php";
include "../Model/attendanceModel.php";

session_start();

$name ="";
$id=""; 
$date="";
$attendanceStatus="";

$nameError="";
$idError="";        
$dateError="";
$statusError="";

$action="";
$message="";
$success=false;



if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        header("content-type:application/json");

        if(isset($_POST["action"]))
            {
                $action = $_POST["action"];
            }
            else
                {
                    $action="add";
                }


            $database = new db();
            $connection = $database->connection();
            $attendance =new attendanceModel();

            if($action=="show")
                {
                     if(isset($_SESSION["name"]) || isset($_COOKIE["name"]))
                           {
                               $message="Welcome ";
                            }
                            else
                            {
                                $message="";
                            }
            
                
                $records=$attendance->getAttendance($connection,"attendance");
                echo json_encode(array("success"=>true,"message"=>$message,"nameError"=>$nameError,"idError"=>$idError,"dateError"=>$dateError,"statusError"=>$statusError,"records"=>$records));
                exit();
    }
            if($action=="add")
                {
                    $name = $_POST["name"];
                    $id = $_POST["id"];
                    $date = $_POST["date"];
                    $attendanceStatus = $_POST["attendanceStatus"];

                    if(empty($name) || !preg_match("/^[A-Za-z ]+$/",$name))
                        {
                            $nameError="Name can't be empty and must contains only letters and space";
                        }
                    if(empty($id) || !preg_match("/^EMP-[0-9]+$/",$id))
                        {
                            $idError="ID is required";
                        }
                    if(empty($date) || !preg_match("/^\d{4}-\d{2}-\d{2}$/",$date))
                        {
                            $dateError="Date is required";
                        }
                
                    if(empty($attendanceStatus))
                        {
                            $statusError="Status must be selected";
                        }
                        else if($attendanceStatus!="Present" && $attendanceStatus!="Absent" && $attendanceStatus!="Leave")
                            {
                                $statusError="Invalid status";
                            }

                    if(empty($nameError) && empty($idError) && empty($dateError) && empty($statusError))
                        {
                            $checkName = $attendance->checkEmployeeName($connection,"attendance",$id,$name);
                            if(mysqli_num_rows($checkName) > 0)
                                {
                                    $success=false;
                                    $message="Employee name already exists";
                                    $idError="This id is already in use";
                                }
                                else
                                    {
                                        $checkAttendance = $attendance->checkAttendance($connection,"attendance",$id,$date);
                                        if(mysqli_num_rows($checkAttendance) > 0)
                                            {
                                                $success=false;
                                                $message="Attendance already exists";
                                            }
                                            else
                                                {
                                        $result = $attendance->addAttendance($connection,"attendance",$name,$id,$date,$attendanceStatus);
                                        if($result)
                                {
                                    $_SESSION["name"]=$name;
                                    setcookie("name",$name,time()+3600);
                                    $success=true;
                                    $message="Attendance is added";
                                }
                                else
                                    {
                                        $success=false;
                                        $message="Attendance is not added";
                                    }

                        }
                        }
                        }
                        else
                            {
                                $success=false;
                                $message="Validation errors";
                            }
                            $records=$attendance->getAttendance($connection,"attendance");
                            echo json_encode(array("success"=>$success,"message"=>$message,"nameError"=>$nameError,"idError"=>$idError,"dateError"=>$dateError,"statusError"=>$statusError,"records"=>$records));
                            exit();
                }
                       
                if($action=="delete")
                    {
                        $attendanceId = $_POST["id"];
                        $result = $attendance->deleteAttendance($connection,"attendance",$attendanceId);
                        if($result)
                            {
                                $success=true;
                                $message="Attendance is deleted";
                            }
                            else
                                {
                                    $success=false;
                                    $message="Attendance is not deleted";
                                }
                                $records=$attendance->getAttendance($connection,"attendance");
                                echo json_encode(array("success"=>$success,"message"=>$message,"nameError"=>$nameError,"idError"=>$idError,"dateError"=>$dateError,"statusError"=>$statusError,"records"=>$records));
                                exit();
                    }
                    
            }
   

?>