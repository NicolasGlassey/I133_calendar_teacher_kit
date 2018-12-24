<?php
/**
 * Author   : nicolas.glassey@cpnv.ch
 * Project  : 133 - Calendar - Step 01
 * Created  : 09.12.2018 - 19h:30
 *
 * Last update :    09.12.2018 author
 *                  add dynamic display of currentMonthInLetter en currentYear in 4 digits
 *                  add function to dynamicaly generate calendar month header
 * Git source  :    [link]
 */


//region global variables
$title = "Calendar";                                        //html title page
$timestamp = time();                                        //get current system date and time
$currentMonthInLetter = date('F', $timestamp);       //currentMonth in letter (sample : decembre)
$currentYear4Digits =  date("Y", $timestamp);;       //current Year (sample : 2018)

//endregion

//region initialization
$listDaysOfWeek = array(
    1 => "Mo",
    2 => "Tu",
    3 => "We",
    4 => "Tu",
    5 => "Fr",
    6 => "Sa",
    7 => "Su"
);                                                          //a list of day name (short description)
//endregion

//region entry point
$monthHeaderGUI = buildMonthHeader($listDaysOfWeek);
//endregion

//region functions
/**
 * @param $listDaysOfWeek
 * @return string
 */
function buildMonthHeader($listDaysOfWeek)
{
    $monthHeader = "";
    foreach ($listDaysOfWeek as $dayShortDescription)
    {
        $monthHeader = $monthHeader . '<li>'.$dayShortDescription.'</li>';
    }
    return $monthHeader;
}
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
    <?php
    echo $monthHeaderGUI;
    ?>
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