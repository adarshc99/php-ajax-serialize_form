<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP Ajax Pagination</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div id="main">
    <div id="header">
      <h1>STUDENT FORM </h1>
    </div>

    <div id="table-data">
      <form id="submit_form">  
        <table width="100%" cellpadding="10px">
          <tr>
            <td width="150px"><label>Name</label></td>
            <td><input type="text" name="fullname" id="fullname" /></td>
          </tr>
          <tr>
            <td><label>Age</label></td>
            <td><input type="number" name="age" id="age" /></td>
          </tr>
          <tr>
            <td><label>Gender</label></td>
            <td>
              <input type="radio" name="gender" value="male" /> Male  
              <input type="radio" name="gender" value="female" /> Female
            </td>
          </tr>
          <tr>
            <td><label>Country</label></td>
            <td>
              <select name="country">
                 <option value="india">India</option>
                 <option value="Aus">Pakistan</option>
                 <option value="england">Bangladesh</option>
                 <option value="nepal">Nepal</option>
                 <option value="sri lanka">Srilanka</option>
              </select>
            </td>
          </tr>
          <tr>
            <td></td>
            <td><input type="button" name="submit" id="submit" value="Submit" /></td>
          </tr>
        </table>
      </form>  
      <div id="response"></div>  
    </div>
  </div>

<script type="text/javascript" src="js/jquery.js"></script>
<script>
 $(document).ready(function()
 {
    $("#submit").on("click",function()
    {
      var name = $("#fullname").val();
      var age = $("#age").val();
      var gender  = $("#gender").val();
      if(name = "" || age == "" || gender == !( $('input:radio[name=gender]').is(':checked')))
      {
        $("#response").fadeIn();
        $("#response").removeClass("success-msg").addClass("error-msg").html("All feilds are reqiured");
      }
      else
      {
        $.ajax(
          {
            url: "save-form.php",
            type: "POST",
            data: $("#submit_form").serialize(),
            success:function(data)
            {
              $("#response").fadeIn();
              if(data)
              {
                $("#response").removeClass("error-msg").addClass("success-msg").html("form submited successfully");
                $("#submit_form").trigger("reset");
              }
              else{
                $("#response").fadeIn();
              $("#response").removeClass("success-msg").addClass("error-msg").html("There was some problem");

              }
              setTimeout(function()
              {
                $("#response").fadeOut("slow");
              },4000);
              
          

             
            
            }

          }
        );

      }
    });
 });
</script>
</body>
</html>
