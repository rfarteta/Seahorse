<?php

echo "
<div id='main'>

Hey, $loggedInUser->displayname. This is an example secure page designed to demonstrate some of the basic features of UserCake. Just so you know, your title at the moment is $loggedInUser->title, and that can be changed in the admin panel. You registered this account on " . date("M d, Y", $loggedInUser->signupTimeStamp()) . ".

<h5>OBJECTIVE </h5>
Be the first to sink all your opponents ships

<h5>CONTENTS</h5>
Players = 3 or more
Questions = 40 ships

<h5>GOAL</h5>
To sink all of your opponent's ships by correctly guessing their location.

<h5>THE FIRST TIME YOU PLAY</h5>

1. Login in with your assigned username and password
   2. Choose the assigned “topic”
3. Wait for your turn to attack or defend


<h5>GAMEPLAY</h5>
Players take turns taking shots at each other. A shot is taken by calling out the coordinates of a space on the 10x10 grid.
Each player takes one shot at a time.
If the player answers the question properly on the coordinates of the space where a ship is located,  the computer tells him so by saying 'hit.'' If he missed, his opponent says 'miss.'
Players should take care to mark the shots they take on their 'Opponent' grid, and whether each shot was a hit or a miss so that they don't call any space more than once. Players may also mark the 'Self' grid with shots taken by their opponent.
A ship is sunk when all of its squares have been hit. When this happens, the player whose ship was sunk says, for example, 'You sank my battleship.''

<h5>Winning</h5>
The first player to destroy all of his opponent's ships wins the game.


</div>";

?>