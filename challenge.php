<?php
include("config.php");

//$userID = $_SESSION['user']; //userID
$userID = "2";


//Retrieving flatID
$userFlatQuery = mysql_query("select flats from Users where userID = $userID");
$userFlatResult = mysql_fetch_array($userFlatQuery);
$userFlatID = $userFlatResult['flats'];
//echo("userFlatID is:$userFlatID");


//Retrieving members from flat
$membersQuery = mysql_query("select members from Flats where flatID = $userFlatID");
$membersResult = mysql_fetch_array($membersQuery);
$membersString = $membersResult['members'];
//echo("$membersString is:$membersString");


$membersArray = explode(",", $membersString);


if (count($membersArray)>1)
{
$userIDPlayerOne = $membersArray['0'];
$userIDPlayerTwo = $membersArray['1'];
}
else
{
echo("too few players");
}

$playerOneQuery = mysql_query("select task, points from Events where userID = $userIDPlayerOne and flatID =$userFlatID ");
//$playerOneResult = mysql_fetch_array("$playerOneQuery");
$playerOneNum = mysql_num_rows($playerOneQuery);


$playerTwoQuery = mysql_query("select task, points from Events where userID = $userIDPlayerTwo and flatID =$userFlatID ");
//$playerTwoResult = mysql_fetch_array("$playerTwoQuery");
$playerTwoNum = mysql_num_rows($playerTwoQuery);



//echo("Points PlayerOne: ");
$playerOneArray = array();

while($dataOne = mysql_fetch_array($playerOneQuery))
{
$playerOneArray[] = $dataOne['points'];
}


$playerTwoArray = array();
//echo("Points PlayerTwo: ");
while ($dataTwo = mysql_fetch_array($playerTwoQuery))
{
$playerTwoArray[] = $dataTwo['points'];
}


?>



<html>

<head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="cars.css" />
    <meta name="viewport" content="user-scalable=no, width=device-width">
</head>
<?php

$scenario = 1;
$timelanes = array();

switch ($scenario) {
    case 1:
        $timelanes["car1"] = array(20, 50, 30, 60, 30, 10,20, 50, 30, 60, 30, 10);
        $timelanes["car2"] = array(30, 40, 30, 60,20, 50, 30, 60, 30, 10);
      break;
    case 2:
        $timelanes["car1"] = array(10,10,10,20,50,10,10,10,20,10);
        $timelanes["car2"] = array(10,50,50,10);
        break;
    case 3:
        $timelanes["car1"] = array(20,10,20,20,10,30,20);
        $timelanes["car2"] = array(30,50);
        break;
    case 4:
		$timelanes["car1"] = $playerOneArray;
        $timelanes["car2"] = $playerTwoArray;
		break;
    case "rand":
        $l1 = rand(0,20);
        //$l2 = rand(0,20);
        $l2 = $l1;

        $timelanes['car1'] = array();
        $timelanes['car2'] = array();

        for ($i = 0; $i < $l1; $i++ )
            $timelanes['car1'][] = rand(1,5)*10;
        for ($i = 0; $i< $l2; $i++)
            $timelanes['car2'][] = rand(1,5)*10;

        break;
}

$img1 = "https://graph.facebook.com/stadolf/picture?type=square";
$img2 = "https://graph.facebook.com/daan.loening/picture?type=square";
?><body>

<div id="lane" >
    <div id="middlelane"> </div>
    <div id="car1" class="car lane1">
        <div class="bubble blue">
            <img src="<?=$img1 ?>" class="driver" />
        </div>
        <div class="carimg"> </div>
    </div>
    <div id="car2" class="car lane2">
        <div class="bubble red">
            <img src="<?=$img2 ?>" class="driver" />
        </div>
        <div class="carimg"> </div>

    </div>
    <div id="bamm"> </div>
</div>

<div></div>
<script type="application/javascript" src="anim.js"></script>
<script type="application/javascript">
    var timelanes = <?php echo json_encode($timelanes); ?>;
    startAnimation(timelanes);
</script>




</body>
</html>