let unitPrice=1000;
document.getElementById("quantity").addEventListener("input",totalCalculation);

function totalCalculation()
{
    let quan = document.getElementById("quantity").value;
    let total = document.getElementById("totalprice");
    

    if(quan<0)
    {
        document.getElementById("Error").innerHTML="Quantity can't be less than 0";
        document.getElementById("quantity").value=0;
        total.value=0;
        return false;
    }
    else 
    {  
        document.getElementById("Error").innerHTML="";

    }
    let Total=unitPrice*quan*30;
    total.value=Total;

    if(Total>1000)
    {
        setTimeout(function(){
        alert("You are eligible for a gift coupon");},10);
    }

    }

