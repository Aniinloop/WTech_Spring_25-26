<?php
include "../Controller/RegistrationValidation.php";
?>

<!DOCTYPE html>
<html>
    <head>
      <title>"Registration Form"</title>
   </head>

   <body>
    <form method ="POST" action ="">
      <table>
        <tr>
          <td><p style ='color:red'> * required field </p></td>
          <br>
        </tr>
      <tr>
        <td> <label for="Name">Name:</label></td>
        <td>
           <input type="text" id ="name" name ="name" style="display:inline;">
          <span style ='color:red; display:inline;'> * </span>
      </td>
      </tr>
        <br>

       <tr>
        <td> <label for="Email"> E-mail:</label></td>
        <td> 
          <input type="email" id ="email" name ="email" style="display:inline;">
          <span style ='color:red; display:inline;'> * </span></td>
        
      </tr>
       <br>

        <tr>
        <td> <label for="Website"> Website:</label></td>
        <td> <input type="text" id ="website" name ="website"></td>
      </tr>
      <br>

       <tr>
        <td> <label for="Comment"> Comment:</label></td>
        <td> <textarea id="comment" name ="comment" rows="3" cols="30"></textarea></td>
      </tr>
      <br>

       <tr>
        <td> <label for="Gender"> Gender:</label></td>
     
        <td>
        <input type= "radio" id ="Female" name ="Female">
        <label for="Female"> Female</label>

        <input type= "radio" id ="Male" name ="Male">
        <label for="Male"> Male</label>

        <input type= "radio" id ="Other" name ="Other" style="display:inline;">
        
        <label for="Other"> Other</label>
        <span style ='color:red; display:inline;'> * </span>
      

        </td>
      </tr>
      <br>
  
     
     <td><input type="submit" id="submit" name="submit"></td>


</table>
  </form>
</body>

</html>