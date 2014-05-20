<?php
require "DoorsProblem.php";

$doors = new DoorsProblem;
print 'Open Doors are: ' . $doors->solveByLogic()->OpensInComma();