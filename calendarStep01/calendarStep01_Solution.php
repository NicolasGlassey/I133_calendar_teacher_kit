<?php
/**
 * Author   : nicolas.glassey@cpnv.ch
 * Project  : 133 - Calendar - Step 01
 * Created  : 09.12.2018 - 19h:30
 *
 * Last update :    09.12.2018 author
 *                  add dynamic display of currentMonthInLetter en currentYear in 4 digits
 * Git source  :    [link]
 */


//region global variables
$title = "Calendar";                                        //html title page
$timestamp = time();                                        //get current system date and time
$currentMonthInLetter = date('F', $timestamp);       //currentMonth in letter (sample : decembre)
$currentYear4Digits =  date("Y", $timestamp);;       //current Year (sample : 2018)

//endregion

//region initialization
//endregion

//region entry point
//endregion

//region functions
//endregion

?>

<!--region gabarit-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        <?php
        echo $title;
        ?>
    </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<!--region calendar-->
<div class="month">
    <ul>
        <li><?php echo $currentMonthInLetter ?><br><?php echo $currentYear4Digits ?></li>
    </ul>
</div>
<ul class="weekdays">
    <li>Mo</li>
    <li>Tu</li>
    <li>We</li>
    <li>Th</li>
    <li>Fr</li>
    <li>Sa</li>
    <li>Su</li>
</ul>
<ul class="days">
    <li>1</li>
    <li>2</li>
    <li>3</li>
    <li>4</li>
    <li>5</li>
    <li>6</li>
    <li>7</li>
    <li>8</li>
    <li>9</li>
    <li><span class="active">10</span></li>
    <li>11</li>
</ul>
<!--endregion-->
</body>
</html>
<!--endregion-->