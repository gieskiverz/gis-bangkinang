<?php session_start();?> 
<html>
<HEAD>
  <TITLE>Login Form</TITLE>
  <STYLE>
  BODY {
    font-family: Verdana, sans-serif;
    font-size: 12pt;
  }
	/*6/17/2012 12:18:13 PM*/
  #Login {
    border: 1px solid silver;
    -moz-border-radius: 6px;
    width: 300px;
    margin: 50px auto;
    padding: 2px;	
    text-align: center;
    /*background:#99ffcc;*/
	border: 5px solid teal; 
    color: white;
    background-image: url(../admin/syarif.jpg);*/
  }
  #Judul {
    /*background:url(../admin/syarif.jpg);*/
    font-size: 1.1em;
    text-align: center;
    background-color: #006633;
    border: 2px solid #ffffff; 
    color: white;
    padding: 4px;
    font-weight:bold;
  }
  .inp {
    font-size: 1.1em;
    text-align: center;
    border: 1px solid silver;-moz-border-radius: 6px;
    padding: 2px;
  }
  .btn{
    border: 1px solid silver;-moz-border-radius: 6px;
    padding: 4px;
    font-weight: bold;
   background-color:#f2f2f2;
  }
  #divLoginError {
    border: maroon 4px solid;-moz-border-radius: 6px;
    width: 400px;
	color: black;
    margin: 2px auto;
    text-align: center;	
    background-color: #33cc00;
    padding: 10px;
  }
  label {
    color: #ffffff;
	font-size: 12pt;
	font-weight: bold;
    font-style: italic;
  }
	
  </STYLE>
 
  </HEAD>


<BODY>


  <DIV ID='Login'>
    <DIV ID='Judul'>
   Login
    </DIV>
    
    <form name='frm_login' id='frm_login' action="loginsubmit.php" method="POST" >
    <p>
    <label>User Name:</label><br />	
    <input class="inp" type=text name='Username' size=20 maxlength=20 />
    </p>
	
    <p>
    <label>Password:</label><br />
    <input class="inp" type=password name='Password' size=20 maxlength=20 />
    </p>

    <p>	
	<input class="btn" type="submit" value="Login" >
	<input class="btn" type="reset"  value="Cancel" >
    </p>
    </form>
    
  </DIV>
	
</BODY>
</HTML>

