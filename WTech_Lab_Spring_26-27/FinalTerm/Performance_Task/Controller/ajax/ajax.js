onload=function()
{
    getAttendance();
    document.getElementById("attendanceForm").onsubmit=function(event)
    {
        event.preventDefault();
        AddAttendance();
    }
}
function getAttendance()
{


    let xhttp = new XMLHttpRequest();


    xhttp.onreadystatechange=function()
    {
        if(this.readyState==4 && this.status==200)
        {
            let response = JSON.parse(this.responseText);
            document.getElementById("message").innerHTML=response.message;
            showTable(response.records);
            
        }
        
        else
        {
            document.getElementById("message").innerHTML=this.status;
        }  
    }
        xhttp.open("POST", "../Controller/attendanceController.php", true);
        xhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
        xhttp.send("action=show");
} 
function AddAttendance()
{
    let name=document.getElementById("name").value;
    let id=document.getElementById("id").value;
    let date=document.getElementById("date").value;
    let attendanceStatus=document.getElementById("attendanceStatus").value;
   
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange=function()
    {
        if(this.readyState==4 && this.status==200)
        {
            let response = JSON.parse(this.responseText);
            document.getElementById("message").innerHTML=response.message;
            document.getElementById("nameError").innerHTML=response.nameError;
            document.getElementById("idError").innerHTML=response.idError;
            document.getElementById("dateError").innerHTML=response.dateError;
            document.getElementById("statusError").innerHTML=response.statusError;
            if(response.success)
            {
                document.getElementById("attendanceForm").reset();

            }
            showTable(response.records);
        }
        else
        {
            document.getElementById("message").innerHTML=this.status;
        }
}
    xhttp.open("POST", "../Controller/attendanceController.php", true);
    xhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
    xhttp.send("action=add&name="+name+"&id="+id+"&date="+date+"&attendanceStatus="+attendanceStatus);

}
    function deleteAttendance(id)
    {
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange=function()
        {   
            if(this.readyState==4 && this.status==200)
        {
            let response = JSON.parse(this.responseText);
            document.getElementById("message").innerHTML=response.message;
            showTable(response.records);
        }
        else
        {
            document.getElementById("message").innerHTML=this.status;
        }
    }
        xhttp.open("POST", "../Controller/attendanceController.php", true);
        xhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
        xhttp.send("action=delete&id="+id);
    }

    function showTable(records)
    {
     let table="";
        for(let i=0; i<records.length; i++)
     {
        table+="<tr>";
        table+="<td>"+records[i].Employee_Name+"</td>";
        table+="<td>"+records[i].Employee_Id+"</td>";
        table+="<td>"+records[i].Attendance_Date+"</td>";
        table+="<td>"+records[i].Status+"</td>";
        table+="<td><button onclick='deleteAttendance(\""+records[i].Attendance_Id+"\")'>Delete</button></td>";
        table+="</tr>";
     }
     document.getElementById("attendanceTable").innerHTML=table;
    }
