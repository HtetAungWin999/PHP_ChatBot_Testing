<?php
session_start();
//check if logged in

$info = (object)[];
if(!isset($_SESSION['userid']))
{
	$info->logged_in = false;
	echo json_encode($info);
	die();
}
require_once("classes/autoload.php");
$DB = new Database();

$DATA_RAW = file_get_contents("php://input");

$DATA_OBJ = json_decode($DATA_RAW);

$Error = "";
//PROCESS THE DATA
if (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type == "signup") 
{
	//sign up
	include("includes/signup.php");
}else
if(isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type == "user_info") 
{
	echo "user_info";
}
