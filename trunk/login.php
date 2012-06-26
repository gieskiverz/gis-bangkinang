<?php session_start();?> 
<html>
<HEAD>
  <TITLE>Login Form</TITLE>
  <STYLE>
  BODY {
    font-family: Verdana, sans-serif;
    font-size: 11pt;
  }
	/*6/17/2012 12:18:13 PM*/
  #Login {
    border: 1px solid silver;
    -moz-border-radius: 6px;
    width: 300px;
    margin: 100px auto;
    padding: 2px;	
    text-align: center;
    /*background:#99ffcc;*/
	border: 3px solid teal; 
    color: white;
    /*background-image: url(syarif.jpg);*/
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
    background-color: #00ff99;
    padding: 10px;
	/*background-image: url(logindulu.gif);*/
  }
  label {
    color: gray;
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
    <label>User Name:</label><br/>
    <input class="inp" type=text name='Username' size=20 maxlength=20 />
    </p>
	
    <p>
    <label>Password:</label><br />
    <input class="inp" type=password name='Password' size=20 maxlength=20 />
    </p>

    <p>	
	<input class="btn" type="submit" value="Login" >
	<a href='view.php'style="text-decoration:none;color:#3b5998;">Back</a>	
    </p>
    </form>
    
  </DIV>
	
</BODY>
</HTML>

