<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once 'db/config.php';
    $data = [];
    $data2 = [];
    $result = mysqli_query($con, "SELECT * FROM member");
    $result2 = mysqli_query($con, "SELECT * FROM member WHERE `regnum` = " . $_COOKIE['chung2Regnum']);
    $i = 0;
    $a = 0;
    while($row = $result->fetch_assoc()){
        foreach($row as $key=>$value){
            $data[$i][$key] = $value;
        }
        $i++;
    }
    while($row2 = $result2->fetch_assoc()){
        foreach($row2 as $key2=>$value2){
            $data2[$a][$key2] = $value2;
        }
        $a++;
    }
    $myHeartGiven = $data2[0]["heart_g"];
    $myHeartTaken = $data2[0]["heart_t"];
?>

    <!DOCTYPE html>
    <html lang="kr">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0, user-scalable=no">
        <title>청3 수양회</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <?php
            echo '<script>var myHeartGiven = ' . $myHeartGiven . '; var myHeartTaken = ' . $myHeartTaken . '</script>';
        ?>
    </head>

    <body>
        <div id="orientationOverlay">
            <img src="img/portrait_only.png" />
        </div>
        <div id="desktopOverlay">
            <p>Mobile을 이용해 주세요!</p>
        </div>
        <div id="loadingOverlay">
            <img src="img/progress.gif" />
        </div>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <i class="fa fa-heartbeat"></i>
                    </button>
                    <a class="navbar-brand" href="index.php"><i class="fa fa-home"></i> 메인으로 돌아가기</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <div class="jumbotron navStatus">
                        <h3>나눔은 사랑입니다</h3>
                        <h4><i class="fa fa-heart"></i> 내가 나눠준 하트 <?php echo $myHeartGiven; ?>개</h4>
                        <h4><i class="fa fa-heart-o"></i> 내가 보유한 하트 <?php echo $myHeartTaken; ?>개</h4>
                    </div>
                </div>
            </div>
        </nav>
        <div class="nav_overlay"></div>
        <div class="container topMargin">
            <?php
                for($a = 0; $a < 7; $a++) {
                $patternSwitch = 'modd';
                $groupLeader = '없음';
                $gHeartTaken = 0;
                $gHeartGiven = 0;
                $gHeartTotal = 0;
                foreach($data as $member) {
                    if($member["group"] == $a) {
                        if($member["level"] == 'c') $groupLeader = $member["name"];
                        $gHeartTaken = $gHeartTaken + $member["heart_t"];
                        $gHeartGiven = $gHeartGiven + $member["heart_g"];
                    }
                }
            ?>
                <div class="jumbotron captain ripplelink">
                    <h1><?php echo $a; ?>조 조장: <?php echo $groupLeader; ?></h1>
                    <img src="img/captain-default.png" />
                </div>
            <?php
                foreach($data as $member) {
                    if($member["group"] == $a) {
                        $mName = $member["name"];
                        $mGender = $member["gender"];
                        $mLevel = $member["level"];
                        echo '<div class="jumbotron memberHeart ripplelink">';
                            echo '<i class="fa fa-heart"></i>';
                        echo '</div>';
                        if($mGender === 'f' || $mGender === 's') {
                            echo '<div class="jumbotron member-f ' . $patternSwitch . '">';
                        } else {
                            echo '<div class="jumbotron member ' . $patternSwitch . '">';
                        }
                        echo '<span>' . $mName . '</span>';
                        echo '</div>';
                        $patternSwitch = ($patternSwitch === 'modd') ? 'meven' : 'modd';
                    }
                        $team_bonus = 0;
                        if($a == 0) {
                            $team_bonus = 0;
                        } elseif ($a == 1) {
                            $team_bonus = 120 + 200 + 160;
                        } elseif ($a == 2) {
                            $team_bonus = 100 + 100 + 200 + 160;
                        } elseif ($a == 3) {
                            $team_bonus = 110 + 110 + 160;
                        } elseif ($a == 4) {
                            $team_bonus = 200 + 160 + 250;
                        } elseif ($a == 5) {
                            $team_bonus = 100 + 160 + 160;
                        } elseif ($a == 6) {
                            $team_bonus = 200 + 110 + 200;
                        }
                }
            ?>
                <div class="jumbotron ripplelink heartboard">
                    <h4><?php echo $a . '조 하트 현황'; ?></h4>
                    <h4>총점수 <?php echo round(($gHeartGiven + $team_bonus)/$gHeartTaken*100,2); ?>점</h4>
                    <h5>조원들이 나눠준 하트: 총 <?php echo $gHeartGiven + $team_bonus; ?>개</h5>
                    <h5>조원들이 보유한 하트: 총 <?php echo $gHeartTaken; ?>개</h5>
                </div>
            <?php } ?>
        </div>
        <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script defer src="https://code.getmdl.io/1.1.1/material.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="js/script.js"></script>
    </body>

    </html>
