<?php
class attendanceModel
{
    function addAttendance($connection, $tablename, $name, $id, $date, $status)
    {
        $sql= "INSERT INTO " .$tablename. "(Employee_Name,Employee_Id,Attendance_Date, Status) VALUES ('".$name."','".$id."','".$date."','".$status."')";
        $result =mysqli_query($connection, $sql);
        return $result;

    }
    function deleteAttendance($connection, $tablename, $attendanceId)
    {
        $sql = "DELETE FROM " .$tablename. " WHERE Attendance_Id='".$attendanceId."'";
        $result = mysqli_query($connection, $sql);
        return $result;
    }
    function getAttendance($connection, $tablename)
    {
        $sql = "SELECT * FROM " .$tablename;
        $result = mysqli_query($connection, $sql);
        $records = array();
        if($result && mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                    {
                        $records[] = $row;
                    }
            }
        return $records;
    
    }
    function checkEmployeeName($connection,$tablename, $id,$name)
    {
        $sql = "SELECT * FROM " .$tablename. " WHERE Employee_Id='".$id."' AND Employee_Name!='".$name."'";
        $result = mysqli_query($connection, $sql);
        return $result;
    }
        function checkAttendance($connection,$tablename, $id,$date)

    {
        $sql = "SELECT * FROM " .$tablename. " WHERE Employee_Id='".$id."' AND Attendance_Date='".$date."'";
        $result = mysqli_query($connection, $sql);
        return $result;
    }
}
   
?>