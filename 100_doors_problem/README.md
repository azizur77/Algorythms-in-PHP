100 Doors Problem
=================

a PHP class for solving 100 Doors puzzle problem.

###Problem

you have 100 doors in a row that are all initially closed. you make 100 passes by the doors starting with the first door every time. the first time through you visit every door and toggle the door (if the door is closed, you open it, if its open, you close it). the second time you only visit every 2nd door (door #2, #4, #6). the third time, every 3rd door (door #3, #6, #9), etc, until you only visit the 100th door.

question: what state are the doors in after the last pass? which are open which are closed?

answer: perfect square numbers: 1,25,36,...,100

###Implementation Logic 
check `DoorsProblem.php` class.

###Answer

run `php cli-solver.php` from command line to get the answer. you can pass the step number to watch doors state in different steps.

or simply run `index.php` through a web server.

