<?php

include("config.php");
//$userID = $_SESSION['user'];
//$userID = 9;
$userSQL = mysql_query("select * from Users where userID = $userSQL");
$userData = mysql_fetch_array($userSQL);
$fname = $userData['fname'];
$lname = $userData['lname'];
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, user-scalable=false;">
  <!-- <meta name="viewport" content="initial-scale=1.0, user-scalable=no"> -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <link rel="stylesheet" type="text/css" href="flattrack.css"/>
  <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
  <title>Flattrack Profile</title>
  <link rel="stylesheet" type="text/css" href="flattrack.css"/>
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu"/>
<style type="text/css">
body, html {
                margin: 0px;
                  font-family: 'Ubuntu';
  height:1136px;
  width:640px;
  background-color: #D9DADB;
            }
#top{
  height: 110px;
  color:white;
  text-align:center;
  background-color: #15B9D6;
  font-size: 300%;
  padding: 40px;
}
#info{
  font-weight: normal;
  color: white;
  background-color: #0E757F;
  font-size: 200%;
  padding: 10px;
}
#facebook-image {

border-radius: 800px;
width: 200px;
height: 200px;
position: absolute;
left: 220px;
top: 100px;
background-size: 220%;
background-position: -99px;
border: 3px solid lightgray;
}
#tasks{
  background-color: #D9DADB;
}
#tasks table{
  background-color: #F6F6F6;
  border: 1px solid #D9DADB;
  border-width: 1px;
  font-size: 150%;
  padding: 10px;
  border-collapse: collapse;
  margin:10px;
  width: 620px;
}

#tasks td{
  border: 1px solid #D9DADB;


  padding: 10px;
}
#bottom{

}
#bottombar{
background-color: gray;
}
#bottombar img{
  background-color: black;
  padding: 20px;
}
</style>
</head>

<body>
<div id="top"> Profile </div>
<div id="info"><?php echo("$fname $lname");?> 1000xp
  <div id="facebook-image" style="background-image:url('https://s3-eu-west-1.amazonaws.com/sauberbam/Daan.jpg');">
</div>
<div id="tasks">

<table >

<?php $sqlQuery = mysql_query("select * from Events where userID = $userID");?>

<tr class="title">
  <td> Chore </td></td>
  <td> Date </td>
  <td> Points </td>
</tr>
<?php
while ($data = mysql_fetch_array($sqlQuery))
{
?>
<!---
<tr>
  <td> Took out the trash! </td>
  <td> 10/10/2013 </td>
  <td> 20 points </td>
</tr>
-->
<tr>
  <td> <?php echo $data['task'];?> </td>
  <td> <?php echo $data['time'];?> </td>
  <td> <?php echo $data['points']; echo(" points");?> </td>
</tr>

<?php
}
?>
<!---
<tr>
  <td> Washed the windows! </td>
  <td> 10.26.2013 </td>
  <td> 40 points </td>
</tr>
<tr>
  <td> Took out the trash! </td>
  <td> 10.27.2013 </td>
  <td> 20 points </td>
</tr>
<tr>
  <td> Fed the Cat! </td>
  <td> 10.27.2013 </td>
  <td> 10 points </td>
</tr>
-->

</table>
</div>
<div id="bottombar">

<a href="main.php">
      <img src = "https://s3-eu-west-1.amazonaws.com/sauberbam/back.png">
      
  </a>

</div>
</body>
</html>