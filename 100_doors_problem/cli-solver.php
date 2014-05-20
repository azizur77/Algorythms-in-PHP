<?php
require "DoorsProblem.php";

//CLI
echo "Type the step to watch doors state for that (To Solve Type '100'). \nStep Number:";
$open = fopen ("php://stdin","r");
$input = fgets($open);
$doors = new DoorsProblem;
echo "\nOpen Doors in step " .  $input . " are: " . $doors->SolveByLogicInStep($input)->OpensInComma();