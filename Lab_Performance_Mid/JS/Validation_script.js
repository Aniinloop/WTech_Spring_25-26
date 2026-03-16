console.log("HTML Page Are Connected");

function collect_data()
{
    let fname = document.getElementById("FirstName").value;
    let lname = document.getElementById("LastName").value;
    let email = document.getElementById("Email").value;
    let phoneNum = document.getElementById("PhoneNumber").value;
    let query = document.getElementById("Query").value;


    if(fname =="" || lname =="" || email =="" || phoneNum =="" || query =="" )
    {
        document.getElementById("Error").innerHTML="Field Value need to be filled up";
        return false;
    }
    else 
    {  
        console.log("First Name:"+fname);
        console.log("Last Name:"+lname);
        console.log("Email:"+email);
        console.log("Phone Number"+phoneNum);
        console.log("Query:"+query);
        return false;
    }

}

