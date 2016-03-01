<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once 'db/config.php';
    $data2 = [];
    $result2 = mysqli_query($con, "SELECT * FROM member WHERE `regnum` = " . $_COOKIE['chung2Regnum']);
    $a = 0;
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
            <h3>광고 보내기</h3>
            <p>새로운 광고가 이전 광고를 덮어씁니다</p>
            <h5>광고 제목</h5>
            <textarea class="title" style="width: 100%; height: 30px;"></textarea>
            <h5>광고 내용</h5>
            <textarea class="content" style="width: 100%; height: 300px;"></textarea>
            <input style="text-align: center; width: 50%; margin: auto; margin-top: 20px;" type="button" class="sendNotice form-control" value="보내기"/>
        </div>
        <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script defer src="https://code.getmdl.io/1.1.1/material.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="js/script.js"></script>
        <script>
            $(function () {
                $('body').on('click', '.sendNotice', function () {
                    var data = {
                        'title': $('.title').val(),
                        'content': $('.content').val()
                    }
                    $.ajax({
                        type: 'POST',
                        url: 'ajax/sendnotice.php',
                        data: data,
                        dataType: 'json'
                    }).always(function () {
                        location.href = 'index.php';
                    });
                });
            });
        </script>
    </body>

    </html>
