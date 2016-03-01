<?php
    $fail_id = '';
    if(isset($_GET['passcode'])) {
        setcookie("chung2Regnum", $_GET['passcode'], strtotime('+30 days'), '/');
        setcookie("chung2Group", $_GET['group'], strtotime('+30 days'), '/');
    } else {
        $fail_id = '&passcode=notfound';
    }
    header('Location:../index.php' . $fail_id);
?>
