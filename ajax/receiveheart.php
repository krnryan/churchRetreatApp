<?php
    require_once '../db/config.php';
    if(isset($_POST['heart']) && $_POST['heart'] !='' && isset($_POST['regnum']) && $_POST['regnum'] !='' && isset($_POST['opporegnum']) && $_POST['opporegnum'] !='') {
        $heart = $_POST['heart'];
        $regnum = $_POST['regnum'];
        $opporegnum = $_POST['opporegnum'];
        $result = mysqli_query($con, "UPDATE member SET heart_t = heart_t + " . $heart . " WHERE regnum=" . $regnum);
        $result2 = mysqli_query($con, "UPDATE member SET heart_t = heart_t + " . $heart . " WHERE regnum=" . $opporegnum);
        return true;
    }
