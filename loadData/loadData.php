<?php

set_time_limit(0);
//ignore_user_abort(true);

require('models/loadData.php');

$fin = fopen("models/Runescape_Market_Data.txt", "r");

$query = "DELETE FROM pricefact";

$db->query($query);

//$query = "DELETE FROM pricefact";
//$db->query($query);


while(!feof($fin)) 
{
	//Get the next lie
	$line = fgets($fin);

	//Parse the line
	$lineArray = explode(",", $line);

	//Pasrse the date value
	$date = explode(",", date('d, m, Y, w', $lineArray[1]));

	$query = "SELECT DateID FROM datedimension WHERE Day = '$date[0]' AND Month = '$date[1]' AND Year = '$date[2]'";

	$dateID = $db->query($query);
	$dateID = $dateID->fetchAll();

	if(sizeof($dateID) == 0)
	{
		//insert the new date
		$query = "INSERT INTO datedimension (Day, Month, Year, DayID) VALUES ('$date[0]', '$date[1]', '$date[2]', '$date[3]')";

		$db->query($query);

		//Get that date's ID
		$query = "SELECT DateID FROM datedimension WHERE Day = '$date[0]' AND Month = '$date[1]' AND Year = '$date[2]'";

		$dateID = $db->query($query);
		$dateID = $dateID->fetchAll();

				
	}

	$dateID = $dateID[0][0];

	//Set category
	$query = "SELECT CatID FROM categorydimension WHERE Category = '$lineArray[2]'";
	$catID = $db->query($query);
	$catID = $catID->fetchAll();

	if(sizeof($catID) == 0)
	{
		$query = "INSERT INTO categorydimension (Category) VALUES ('$lineArray[2]')";
		$db->query($query);

		$query = "SELECT CatID FROM categorydimension WHERE Category = '$lineArray[2]'";
		$catID = $db->query($query);
		$catID = $catID->fetchAll();
	}

	$catID = $catID[0][0];

	$lineArray[5] = preg_replace("/'/"," ",$lineArray[5]);

	//Set item
	$query = "SELECT itemID FROM itemdimension WHERE Item = '$lineArray[5]'";
	$itemID = $db->query($query);

	if($itemID == false)
	{
		echo $lineArray[5];
	}

	$itemID = $itemID->fetchAll();

	
	if($itemID == 18)
	{
		echo $line;
	}



	if(sizeof($itemID) == 0)
	{
		$query = "INSERT INTO itemdimension (CatID, Item) VALUES ('$catID', '$lineArray[5]')";
		$db->query($query);

		$query = "SELECT itemID FROM itemdimension WHERE Item = '$lineArray[5]'";
		$itemID = $db->query($query);
		$itemID = $itemID->fetchAll();
	}

	$itemID = $itemID[0][0];

	if($lineArray[7] == "Yes")
	{
		$memberID = 1;
	}
	else
	{
		$memberID = 2;
	}

	$query = "INSERT INTO pricefact (ItemID, DateID, MemberID, Price, PriceChange, HighAlch, LowAlch) VALUES ('$itemID', '$dateID', '$memberID', '$lineArray[9]', '$lineArray[8]', '$lineArray[4]', '$lineArray[6]')";

	$db->query($query);
}


fclose($fin);
?>