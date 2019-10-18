<?php
if(isset($_POST['page']))
{
	$page = trim(filter_input(INPUT_POST, 'page', FILTER_SANITIZE_STRING));
}
else
{
	$page = "home";
}

if(isset($_POST['datedrill']))
{
	$datedrill = trim(filter_input(INPUT_POST, 'datedrill', FILTER_SANITIZE_STRING));
}
else
{
	$datedrill = "year";
}

if(isset($_POST['itemdrill'] ))
{
	$itemdrill = trim(filter_input(INPUT_POST, 'itemdrill', FILTER_SANITIZE_STRING));
}
else
{
	$itemdrill = "category";
}

require_once("phpChart_Lite/conf.php");

include("views/header.php");


if($page == "home")
{
	require('models/warehosueConnection.php');

	$select = "SELECT ";
	$from = "FROM (((((pricefact INNER JOIN datedimension ON pricefact.DateID = datedimension.DateID) INNER JOIN weekday ON datedimension.DayID = weekday.weekDayID) INNER JOIN itemdimension ON pricefact.ItemID = itemdimension.ItemID) INNER JOIN categorydimension ON itemdimension.CatID = categorydimension.CatID) INNER JOIN memberonlydimension ON pricefact.MemberID = memberonlydimension.MemberID)";
	$groupBy = "GROUP BY ";
	$tableHead = array();

	//Set the time section
	if($datedrill == "year")
	{
		$select .= "datedimension.Year, ";
		$groupBy .= "datedimension.Year, ";
		array_push($tableHead, "Year");
	}
	else if($datedrill == "month")
	{
		$select .= "datedimension.Year, datedimension.Month, ";
		$groupBy .= "datedimension.Year, datedimension.Month, ";
		array_push($tableHead, "Year", "Month");
	}
	else
	{
		$select .= "datedimension.Year, datedimension.Month, datedimension.Day, ";
		$groupBy .= "datedimension.Year, datedimension.Month, datedimension.Day, ";
		array_push($tableHead, "Year", "Month", "Day");
	}

	//Set Produt section
	if($itemdrill == "category")
	{
		$select .= "categorydimension.Category, ";
		$groupBy .= "categorydimension.Category";
		array_push($tableHead, "Category");
	}
	else if($itemdrill == "item")
	{
		$select .= "categorydimension.Category, itemdimension.Item, ";
		$groupBy .= "itemdimension.Item";
		array_push($tableHead, "Item");
	}



	$query = $select . "AVG(pricefact.Price) AS Price, AVG(pricefact.PriceChange) AS PriceChange, AVG(pricefact.HighAlch) AS HighAlch, AVG(pricefact.LowAlch) AS LowAlch, memberonlydimension.MemberOnly " . $from . $groupBy;

	array_push($tableHead, "Price", "PriceChange", "HighAlch", "LowAlch", "MemberOnly");

	ini_set('max_execution_time', 500);
	ini_set('memory_limit', '-1');

	$results = $db->query($query);
	
	include("dataWarehouse/warehouseControlls.php");
	
}
else if($action = "load")
{
	require('models/loadData.php');
	include('loadData/loadDataPage.php');
}

include("views/footer.php");
?>