<?php
require "BottlesOfBeer.php";

/**
 * BottlesOfBeer default vars
 */
$bottles = 99;
$pass_by = 1;
$to_number = 0;

// Alter the defaults if yes
$open = fopen ("php://stdin","r");
echo "Do you want to alter defaults [y|n]? ";

$wanted = str_replace("\n","",fgets($open));
$acceptable = array("y","yes","yeah","yep","true");

if (in_array($wanted , $acceptable)){

	echo "Number of Bottles? (default : 99) ? ";
	$bottles = str_replace("\n","",fgets($open));

	echo "Number of passes in each chores (default : 1) ? ";
	$pass_by = 	str_replace("\n","",fgets($open));

	echo "Stop when Bottoles arrive to number (default :0) :  ? ";
	$to_number = 	str_replace("\n","",fgets($open));
}

$singer = new BottlesOfBeer($pass_by,$bottles);
echo $singer->singToNumber($to_number) . "\n";