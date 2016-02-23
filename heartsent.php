<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once 'db/config.php';
    $data = [];
    $data2 = [];
    $result = mysqli_query($con, "SELECT * FROM member WHERE `id` = " . $_GET['to']);
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
    $toName = $data[0]["name"];
    $toGender = $data[0]["gender"];
    $myHeartGiven = $data2[0]["heart_g"];
    $myHeartTaken = $data2[0]["heart_t"];
    $myGroup = $data2[0]["group"];

    $mGenderIssued = "";
    if ($toGender == 'm') $mGenderIssued = " 형제님";
    if ($toGender == 'f') $mGenderIssued = " 자매님";
    if ($toGender == 'p') $mGenderIssued = " 목사님";
    if ($toGender == 's') $mGenderIssued = " 사모님";
?>

    <!DOCTYPE html>
    <html lang="kr">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0, user-scalable=no">
        <title>청2 수양회</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script>
            history.pushState(null, null, 'index.php');
            window.addEventListener('popstate', function (event) {
                history.pushState(null, null, 'index.php');
            });
        </script>
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
            <div class="jumbotron msgBody">
                <p>
                    <?php echo $toName . $mGenderIssued . '에게<br>1개의 하트를 보냈습니다'; ?><br>
                    <a href="group.php?group=<?php echo $myGroup; ?>">그룹 페이지로 돌아가기</a>
                </p>
                <img class="msgHeart" src="img/heart.png" />
            </div>
        </div>
        <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script defer src="https://code.getmdl.io/1.1.1/material.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="js/script.js"></script>
    </body>

    </html>