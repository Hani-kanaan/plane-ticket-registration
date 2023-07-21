<?php
	if (isset($_GET["rowid"]) && isset($_GET["columnid"])){
		extract($_GET);
		require_once("connect.php");
		session_start();
		
		$query = "SELECT * FROM seats WHERE rowid = '{$rowid}' AND columnid = '{$columnid}';";
	
		$result = mysqli_query($con, $query);
		
		if (!$result) {
			die(mysqli_error());
		}
				if (mysqli_num_rows($result) !=0) {
			$row = mysqli_fetch_assoc($result);
			$flag = $row['flag'];
			if ($rowid == $row['rowid'] AND $columnid== $row['columnid'] AND $row['flag'] ==0) {
				$query = "UPDATE `seats` SET `flag`=1 , `bookedby`='{$_SESSION["uname"]}' WHERE rowid = '{$rowid}' AND columnid = '{$columnid}'; ";
				mysqli_query($con, $query);
				
				$_SESSION["loggedin"] = true;
				
			   header("Location:http://localhost/11930070/finalpage.php");
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
  @import url("https://fonts.googleapis.com/css?family=Lato:400,700");
#bg {
  background-image: url('img/background.jpg');
  position: fixed;
  left: 0
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
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  overflow: hidden;
  margin: 0;
  padding: 0;
}

form {
  width: 350px;
  position: relative;
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
form .form-field:nth-child(1)::before {
  background-image: url(img/user-icon.png);
  width: 20px;
  height: 20px;
  top: 15px;
}
form .form-field:nth-child(2)::before {
 
  width: 16px;
  height: 16px;
}
form .form-field:nth-child(3)::before {

  width: 16px;
  height: 16px;
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

blockquote {
  color: white;
  text-align: center;
}


</style>
</head>

	<body>
	

<div id="bg"></div>
     
   <form action="seats.php" method="get">
<img src="img/logo.png">
 <div class="form-field">
    <input type="text" placeholder="row" name="rowid" />    </div>
	 <div class="form-field">
    <input type="text" placeholder="column" name="columnid"/>   </div>         
 <div class="form-field">	
    <button class = "btn" type="submit">book seat</button> </form>
	
	<form action ="clearbooking.php" method = "get"><button class = "btn" type="submit">clear bookings</button></div></form>
	
	 </div>
	
	<table border="1">
		<thead>
        <tr>
          <th>Row</th>
          <th>column</th>
            <th>price</th>
        </tr>
		</thead>
	<?php 	
		extract($_GET);
		require_once("connect.php");
	
		
	
	$query = "SELECT * FROM seats;";
	
		$result = mysqli_query($con, $query);
	
		while ($rows = mysqli_fetch_assoc($result)) {
			
			if ($rows['flag'] == 1){
				$color = '#FF0000';
				
			}else{
				$color = '#00FF00';
			}
				
			?>			
        <tr style="color:<?=$color?>;">
        <td><?=$rows['rowid']?> </td>
          <td><?=$rows['columnid']?></td>
       <td><?=$rows['price']?></td>
         
        </tr>
         
      
   
		
		
		
			
	<?php	}
?>

</body>

</html>