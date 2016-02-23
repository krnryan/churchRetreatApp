<?php
    require_once '../db/config.php';
    if(isset($_POST['content']) && $_POST['content'] !='' && isset($_POST['title']) && $_POST['title'] !='') {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $result = mysqli_query($con, "INSERT INTO `announcement` (`title`, `content`) VALUES ('" . $title . "', '" . $content . "')");
        return true;
    }
