<?php
	if (isset($_GET["location"]) && isset($_GET["destination"])){
		extract($_GET);
		require_once("connect.php");
	
		
		$query = "SELECT * FROM flight WHERE location = '{$location}' AND destination = '{$destination}' AND depdate BETWEEN '{$depdate}' AND '{$retdate}';" ;
		
		$result = mysqli_query($con, $query);
	
		if (!$result) {
			die(mysqli_error());
		}

		if (mysqli_num_rows($result) !=0) {
			$row = mysqli_fetch_assoc($result);
			
			if ($location == $row['location']) {
				session_start();
				$_SESSION["loggedin"] = true;
				$_SESSION["location"] = $row["location"];
				header("Location:http://localhost/11930070/seats.php");
			}
		}
	}
?>
	<!DOCTYPE html>
<html>		
<head>

  
  <meta charset="UTF-8">
  <link rel="website icon" type="png" href="\11930070\img\web.png">
  <title>seats</title>
<style type="text/css">
#bg {
  background-image: url('img/background.jpg');
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-size: cover;
  filter: blur(5px);
}

body {
  font-family: 'Lato', sans-serif;
  color: #4A4A4A;
  display: flex;
   
  
  overflow: hidden;
  margin: 0;
  padding: 0;
}

form {
  width: 500px;
  position: absolute;
}
form .form-field::before {
  font-size: 20px;
  position: absolute;
  left: 15px;
  top: 17px;
  color: #888888;
  content: " ";
  display: block;
  background-size: cover;
  background-repeat: no-repeat;
}

form .form-field {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  margin-bottom: 1rem;
  position: relative;
}
form input {
  font-family: inherit;
  width: 100%;
  outline: none;
  background-color: #fff;
  border-radius: 4px;
  border: none;
  display: block;
  padding: 0.9rem 0.7rem;
  box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16);
  font-size: 17px;
  color: #4A4A4A;
  text-indent: 40px;
}
form .btn {
  outline: none;
  border: none;
  cursor: pointer;
  display: inline-block;
  margin: 0 auto;
  padding: 0.9rem 2.5rem;
  text-align: center;
  background-color: #47AB11;
  color: #fff;
  border-radius: 4px;
  box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16);
  font-size: 17px;
}
.whitecolor{color:white;
           font-weight: bold;
}
.date{
 color:white;
font-weight:bold;
width: 500px;
  position: relative;
 }
 *:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;

}

form{
    height: 580px;   
     width: 510px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;

}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.social{
  margin-top: 30px;
  display: flex;
}
.social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
}
/* style for the pictures below*/
    
    a {
      color: black;
    }
    
    .header {
      padding: 30px 0 0;
      float: left;
      width: 100%;
      background: white;
    }
    
    .wrapper {
      height: auto !important;
      height: 100%;
      margin: 0 auto; 
      overflow: hidden;
    }
    
    
    .container {
      width: auto;
      margin: 0 auto;
    }
    
    .page-container {
      float: left;
      margin: 0 auto 300px;
      position: relative;
    }
    
    .header {
      overflow: hidden;
      clear: both;
    }
  
    
    .shuffle-me {
      width: 25%;
      height: 150px;
      margin: 2%;
      display: block;
      position: relative;
      float: left;
      width: 26%;
      height: 209px;
    }

    .info {
     
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0,0,0,0.35);
      padding: 20px;
      text-align: center;
      display: block;
      box-sizing: border-box;
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
    }

    .info h1 {
      font-weight: bold;
      color: white;
      font-size: 20px;
      margin: 55px 0 0;
      text-transform: uppercase;
      letter-spacing: 1px;
      padding: 0;
      
    }

    .info h1 a {
     color: #fff; 
    }
    .info h2 {
      margin-top: 0;
      color: white;
      font-size: 14px;
      font-family: georgia;
      font-style: italic;
    }

    .shuffle-group {
      position: relative;
      width: 100%;
      margin-bottom: 10px;
    }

    .shuffle-group .shuffle-me {
      width: 31.9%;
      float: left;
      margin: 5px;
    }

    .shuffle-group .shuffle-me:first-child {
      width: 66%;
      float: left;
      height: 431px;
    }
    .shuffle-group .shuffle-me:first-child h1 {
      margin-top: 190px;
      font-size: 30px;
    }
#follow{
  font-weight: bold;
  font-family: serif;
  font-size: 25px;

  }
  table {
  border-spacing: 1;
  border-collapse: collapse;
  background: white;
  border-radius: 6px;
  overflow: hidden;
  max-width: 800px;
  width: 100%;
  margin: 0 auto;
  position: relative;
}
table * {
  position: relative;
}
table td, table th {
  padding-left: 8px;
}
table thead tr {
  height: 60px;
  background: #FFED86;
  font-size: 16px;
}
table tbody tr {
  height: 48px;
  border-bottom: 1px solid #E3F1D5;
}
table tbody tr:last-child {
  border: 0;
}
table td, table th {
  text-align: left;
}
table td.l, table th.l {
  text-align: right;
}
table td.c, table th.c {
  text-align: center;
}
table td.r, table th.r {
  text-align: center;
}

@media screen and (max-width: 35.5em) {
  table {
    display: block;
  }
  table > *, table tr, table td, table th {
    display: block;
  }
  table thead {
    display: none;
  }
  table tbody tr {
    height: auto;
    padding: 8px 0;
  }
  table tbody tr td {
    padding-left: 45%;
    margin-bottom: 12px;
  }
  table tbody tr td:last-child {
    margin-bottom: 0;
  }
  table tbody tr td:before {
    position: absolute;
    font-weight: 700;
    width: 40%;
    left: 10px;
    top: 0;
  }



</style>
</head>

	<body>
	

<!--<div class="background">-->

        <div class="shape"></div>
        <div class="shape"></div>
    </div>
	
	
<div id="bg"></div>
 
<form action="ticket.php" method="get">

<form  onsubmit="return validateForm()">
<img src="img/logo.png">
  <div class="form-field">

    <p class="whitecolor"> FROM: <br/> <input type="text" placeholder=" Insert a Location.." name = "location" required/>
  </p><pre>          </pre><p class="whitecolor"> TO: <br/> <input type="text" placeholder=" Insert a Location.." name ="destination" required/>
  </p>
  </div>
  <div class="date">
    Select range:
    <input type="date" name="depdate" required pattern="\d{4}-\d{2}-\d{2}" />
    <span class="validity"></span>
  </div><br/>
  <div class="date">
    
    <input type="date" name="retdate" required pattern="\d{4}-\d{2}-\d{2}" placeholder="select a date" />
    <span class="validity"></span>
  </div><br/>  
  
  <div class="form-field">
    <button class="btn" type="submit">Book Now</button>
  </div>

  <div id="images-container">
<label id="follow">Follow us on:</label><center><a 
href="https://www.linkedin.com"   target="_blank"> 
 <img src="img/LIN.png"alt=" small Image"></a> 
<a 
href="https://www.instagram.com"  target="_blank">
<img src="img/insta.png" alt="Small Image"></a>
 <a
 href="https://www.facebook.com" target="_blank">
      <img src="img/FACE.png" alt="Small Image"></a>
	  
</center>

</div>

</form>
</form>

	
	<table border="1"  style="margin-top:50px; margin-left:1100px;" >
		<thead>
        <tr>
          <th>Location</th>
          <th>Destination</th>
          <th>departure date</th>
		  <th>return date</th>
		  <th>airlines</th>
        </tr>
		</thead>
   <?php
		$query = "SELECT * from flight;";
		require_once("connect.php");
		$result = mysqli_query($con, $query);
		while ($row = mysqli_fetch_assoc($result)) {
?>
		<tr>
			<td><?=$row['location']?></td>
			<td><?=$row['destination']?></td>
			<td><?=$row['depdate']?></td>
			<td><?=$row['retdate']?></td>
			<td><?=$row['airlines']?></td>
			</tr>

<?php
		}
		
?></table>

</body>

</html>