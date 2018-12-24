<?php
/**
 * Author   : nicolas.glassey@cpnv.ch
 * Project  : 133 - Calendar - Step 01
 * Created  : 09.12.2018 - 19h:30
 *
 * Last update :    09.12.2018 author
 *                  add dynamic display of currentMonthInLetter en currentYear in 4 digits
 *                  add function to dynamically generate calendar month header
 *                  23.12.2018 author
 *                  New features:
 *                  Fill calendar with last day of previous month
 *                  Fill calendar with first days of next month
 *                  Set timezone
 *                  Bug fixes:
 *                  Current date appears only once.
 *                  The first day of the month is fixed (not always Monday).
 * Git source  :    [link]
 */


//region global variables
date_default_timezone_set('Europe/Paris');
//$currentTimeZone = date_default_timezone_get ();
$title = "Calendar";                                        //html title page
$timestamp = time('F');                                     //get current system date and time
$currentMonthInLetter = date('F', $timestamp);       //currentMonth in letter (sample : decembre)
$currentMonth = date('m', $timestamp);               //
$currentYear4Digits =  date("Y", $timestamp);;       //current Year (sample : 2018)
$currentDay = date('j',$timestamp);                  //current day
$firstDayOfMonth = date('01-m-Y', $timestamp);
$firstDayOfMonthIndex = date('N', strtotime($firstDayOfMonth));
$lastDayOfMonth = date('t',$timestamp);              //last day of current month
$lastDayOfPreviousMonth = date('t', strtotime('01-'.($currentMonth-1).'-'.$currentYear4Digits));

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
$monthDaysGUI = buildMonthCalendar($lastDayOfMonth, $currentDay, $firstDayOfMonthIndex, $lastDayOfPreviousMonth);
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

/**
 * @param $lastDayOfMonth
 * @param $currentDay
 * @param $indexFirstDayOfMonth
 * @param $lastDayOfPreviousMonth
 * @return string
 */
function buildMonthCalendar($lastDayOfMonth, $currentDay, $indexFirstDayOfMonth, $lastDayOfPreviousMonth)
{
    $dayNumberGUI = "";

    //fill first week days with the last days of previous month calendar
    $firstMondayOfCalendarDate = $lastDayOfPreviousMonth - ($indexFirstDayOfMonth - 2);
    for ($dayNum = $firstMondayOfCalendarDate ; $dayNum <= $lastDayOfPreviousMonth ; $dayNum++)
    {
        $dayNumberGUI = $dayNumberGUI . '<li><span style= "color:red">'.$dayNum.'</span></li>';
    }

    //fill the current month
    for ($dayNum = 1 ; $dayNum <= $lastDayOfMonth ; $dayNum++)
    {
        if ($currentDay == $dayNum) {
            $dayNumberGUI = $dayNumberGUI . '<li><span class="active">'.$dayNum.'</span></li>';
        }
        else {
            $dayNumberGUI = $dayNumberGUI . '<li>' . $dayNum . '</li>';
        }
    }

    //fill last week days with the first days of next month calendar
    $dayNextMonthToAdd = 7 - (($lastDayOfMonth + $indexFirstDayOfMonth-1) % 7);
    for ($dayNum = 1 ; $dayNum <= $dayNextMonthToAdd ; $dayNum++)
    {
        $dayNumberGUI = $dayNumberGUI . '<li><span style= "color:orange">'.$dayNum.'</span></li>';
    }

    return $dayNumberGUI;
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
    <ul class="days">
        <?php echo $monthDaysGUI;?>
    </ul>
</ul>
<!--endregion-->
</body>
</html>
<!--endregion-->