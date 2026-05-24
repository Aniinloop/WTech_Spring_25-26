<?php
include "../Controller/attendanceController.php";
echo "<h1>Employee Attendance Management System</h1>";
?>
<!DOCTYPE html>
<html>
    <head> 
        <link rel="stylesheet" href="css/Style.css">
        <Script src ="../Controller/ajax/ajax.js"> </Script>
    </head>
    <body>
        <p id="message"></p>
        <form method = "post" action="../Controller/attendanceController.php" id="attendanceForm">
            <table>
                <tr>
                    <td> <label for ="name">Employee Name: </label></td>
                    <td> <input type ="text" id="name" name="name" > </td> 
                    <td><p id="nameError" class="error"></p></td>    
                </tr>
                <tr>
                    <td> <label for ="id">Employee ID: </label></td>
                    <td> <input type ="text" id ="id" name ="id" placeholder="EMP-101"></td>
                    <td><p id="idError" class="error"></p></td>
                </tr>
                <tr>
                    <td> <label for ="date">Attendance Date: </label></td>
                    <td> <input type ="date" id ="date" name ="date" placeholder="YYYY-MM-DD" ></td>
                    <td><p id="dateError" class="error"></p></td>
                </tr>
                <tr>
                  <td><label for="attendanceStatus">Status: </label></td>
                  <td>
                  <select id="attendanceStatus" name="attendanceStatus">
                  <option value="">Select Status</option>
                  <option value="Present">Present</option>
                  <option value="Absent">Absent</option>
                  <option value="Leave">Leave</option>
                  </select>
                  </td>
                  <td><p id="statusError" class="error"></p></td>
                </tr>
                <tr>
                    <td><button type ="submit" id="submitbutton" name = "submit" value="Add Attendance">Add Attendance</button></td>
                </tr>
            </table>
        </form>

      <table>
        <tr>
            <th>Employee Name</th>
            <th>Employee ID</th>
            <th>Attendance Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        <tbody id="attendanceTable"></tbody>
       </table>

    </body>
</html>