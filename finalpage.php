<?php
		session_start();
			if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true) {
		header("Location: login.php");
	} else {
		require_once('connect.php');
		
		$query = "  SELECT  (SELECT SUM(price) FROM seats WHERE bookedby = '{$_SESSION["uname"]}') AS price ,
		 (SELECT count(rowid)  FROM seats WHERE bookedby = '{$_SESSION["uname"]}' ) AS number ";
	
		$result = mysqli_query($con, $query);
	
		if (!$result) {
			die(mysqli_error());
		}
				if (mysqli_num_rows($result) !=0) {
			$row = mysqli_fetch_assoc($result);
			$price = $row['price'];
			$number = $row['number'];
				$_SESSION["loggedin"] = true;
		
         		require_once("connect.php");
				//header("Location: ticket.php");
		?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  
  <title>checkout</title>
  
<style>
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

<!--@media screen and (max-width: 35.5em)--> {
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
#bd{
	 background-image: url('img/background.jpg');
	 background-color:green;
}
</style>
</head>
<body>
 
<body id = "bd">
<div id="body"></div>
		<table>
		<thead>
        <tr>
          <th>number of tickets</th>
          <th>to</th>
          <th>from</th>
		  <th>date</th>
		  <th>airlines</th>
		  <th>total</th>
        </tr>
		</thead>
	<?php
$querys = " SELECT * from flight WHERE location = '{$_SESSION["location"]}' ";
	$results = mysqli_query($con, $querys);
		$rows = mysqli_fetch_assoc($results);
	?>
		<tr>
        <td><?=$number?> </td>
		 <td> <?=$rows['location']?></td>
		  <td> <?=$rows['destination']?></td>
		   <td> <?=$rows['depdate']?></td>
		    <td> <?=$rows['airlines']?></td>
			<td> <?=$price?>$</td>
        </tr>
				

        <?php
			 
			}
		} 
	?>
	
	
    
	
	
	 
<!--<input id="ccn" type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="19" placeholder="xxxx xxxx xxxx xxxx"  />-->

<form action="finalpage.php" method="get">

<div class="form-field">
<input  type="tel" pattern="[0-9\s]{13,19}"  maxlength="19" placeholder="xxxx xxxx xxxx xxxx"  required /> Credit card info
<button class = "btn" type="submit">checkout</button></br>
<a href="logout.php">Logout</a><br/>
<a href="seats.php">book another seat</a><br/>
<a href="ticket.php">choose another flight</a><br/>
	<div>
</body>
</html>
		

		