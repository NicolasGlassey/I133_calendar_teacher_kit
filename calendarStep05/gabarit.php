<?php
/**
 * Author   : nicolas.glassey@cpnv.ch
 * Project  : 133
 * Created  : 23.12.2018 - 23:56
 *
 * Last update :    [01.12.2018 author]
 *                  [add $logName in function setFullPath]
 * Git source  :    [link]
 */
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