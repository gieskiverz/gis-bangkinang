<?php session_start();?> 
<html>
<head>
  <title>Login Form</title>
  <style type="text/css">
  body {
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
    /*background-image: url(./syarif.jpg);*/
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
  #LoginError {
	border: 1px solid silver;
	font-family: Arial,Helvetica,sans-serif;
	font-size: 15px;
	color: white;
  
  }
  label {
    color: gray;
    font-style: italic;
  }


/*Saturday, June 30, 2012 11:27:14 AM*/
  body {
  background-color: #333333;
  }
  #page {
  margin: auto;
  width: 780px;
  background-image: url(../login/page.png);
  text-align: left;
  background-repeat: repeat-y;
  }
  #header {
  clear: both;
  width: 780px;
  height: 100px;
  background-image: url(../login/header.png);
  font-family: Arial,Helvetica,sans-serif;
  font-size: 16px;
  font-weight: bold;
  color: #006633;
  text-align: center;

  }
  /*#menu {
  background-image: url(login/menu.png);
  width: 780px;
  height: 37px;
  clear: both;
  background-repeat: no-repeat;
  padding-left: 45px;
  }*/
  #contentarea {
  width: 780px;
  padding-top: 10px;
  clear: both;
  }
  /*#sidebar {
  float: left;
  padding-left: 45px;
  width: 180px;
  margin-bottom: 10px;
  }
  
  #content {
  float: right;
  text-align: justify;
  width: 500px;
  padding-right: 45px;
  }*/

  #footer {
  clear: both;
  width: 780px;
  height: 75px;
  background-image: url(../login/footer.png);
  font-family: Arial,Helvetica,sans-serif;
  font-size: x-small;
  color: white;
  text-align: center;
  }
  /*#sidebar a {
  }
  #menu a {
  font-weight: bold;
  font-family: Arial,Helvetica,sans-serif;
  font-size: 14px;
  color: white;
  }
  #menu a:hover {
  background-image: url(login/hover.png);
  background-repeat: repeat-x;
  }*/

  </style>
</head>

<body>
  <div id="page">
    <div id="header"><br/><br/>
	  SISTEM INFORMASI GEOGRAFIS <br/> FASILITAS UMUM KOTA BANGKINANG
	 </div>

    <div id="contentarea">
	<div id="contentarea">
        <div id='Login'>
          <div id='Judul'>
            Login
          </div>

          <form name='frm_login' id='frm_login' action=
          "../loginsubmit.php" method="post">
            <p><label>User Name:</label><br />
            <input class="inp" type="text" name='Username' size=
            "20" maxlength="20" /></p>

            <p><label>Password:</label><br />
            <input class="inp" type="password" name='Password'
            size="20" maxlength="20" /></p>

            <p><input class="btn" type="submit" value="Login" />
            <a href='../view.php' style=
            "text-decoration:none;color:#3b5998;">Back</a></p>
          </form>
        
      </div>
    </div>

    <div id="footer">
      <br />
      Copyright @ deyen 2012
    </div>
  </div>
</body>
</html>
