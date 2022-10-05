<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="Edit Member Form" />
    <meta name="keywords" content="HTML, CSS, JavaScript" />
    <meta name="author" content="MSP Group 20" />
    
    <link href="styles/editMember.css" rel="stylesheet" type="text/css" />

    <title>Edit Member Form</title>

    
    
  </head>
  <body>


<h2>Edit Member Form</h2>

<form id="editMemberform"> 

    
        <!-- <legend style="font-size:19px"><strong>Member Details</strong></legend> -->
   <p>
      <label for="firstname" id="fName" style="font-size:19px">First Name</label>
      <input type="text" pattern="[a-zA-Z]{2,20}" id="firstname" name="firstname" required/>
   
      <label for="lastname" id="lName" style="font-size:19px">Last Name</label>
      <input type="text" pattern="[a-zA-Z]{2,20}" id="lastname" name="lastname" required/> 
    </p>
    <p> 
      <label for ="DateofBirth" id="dob" style="font-size:19px">Date of Birth</label>
      <input type="date" pattern="\d{1,2}\/\d{1,2}\/\d{4}" name="dateofbirth" id="DateofBirth" required/>
      
   </p>

   <p> 
    <label for="email" id="em" style="font-size:19px">Email</label>
    <input type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required/>
    </p>
    
    <p>
    <label for="phonenum" id="mobilenum" style="font-size:19px">Mobile Number (Optional)</label>
    <input type="tel" name= "phonenum" id="phonenum" maxlength="12" pattern="[\d\s]{8,12}" placeholder="For eg. 0400 000 000" required/>
    </p>

 


<a id=cancelButton>
    <input type="reset" id="cancel" value="Cancel"/>
</a>

<button id="button">
    <input type="submit" id= "sub" value="Submit"/>
</button>


</form>






</body>  
</html>