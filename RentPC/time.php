<?php
// Get the current date
$currentDate = date('Y-m-d');

// Add 1 month to the current date
$newDate = date('Y-m-d', strtotime($currentDate . ' +1 month'));

// Display the current date and the date with 1 month added
echo 'Current Date: ' . $currentDate . '<br>';
echo 'Date with 1 Month Added: ' . $newDate;


?>