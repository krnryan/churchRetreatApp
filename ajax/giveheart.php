<?php
    require_once '../db/config.php';
    if(isset($_POST['mid']) && $_POST['mid'] !='' && isset($_POST['from']) && $_POST['from'] !='') {
        $mid = $_POST['mid'];
        $from = $_POST['from'];
        $result1 = mysqli_query($con, "UPDATE member SET heart_t = heart_t + 1 WHERE id=" . $mid);
        $result2 = mysqli_query($con, "UPDATE member SET heart_t = heart_t - 1 WHERE regnum=" . $from);
        $result3 = mysqli_query($con, "UPDATE member SET heart_g = heart_g + 1 WHERE regnum=" . $from);
        return true;
    }