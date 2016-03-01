<?php
    require_once '../db/config.php';
    $data = [];
    $result = $con->query("SELECT * FROM member WHERE `regnum` = " . $_COOKIE['chung2Regnum']);
    $i = 0;
    while($row = $result->fetch_assoc()){
        foreach($row as $key=>$value){
            $data[$i][$key] = $value;
        }
        $i++;
    }
    $mHeartGiven = $data[0]["heart_g"];
    $mHeartTaken = $data[0]["heart_t"];
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
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body style="overflow-x: hidden">
    <div class="cookingbg"></div>
    <div class="cookingbg2"></div>
    <div id="orientationOverlay">
        <img src="../img/portrait_only.png" />
    </div>
    <div id="desktopOverlay">
        <p>Mobile을 이용해 주세요!</p>
    </div>
    <div id="loadingOverlay">
        <img src="../img/progress.gif" />
    </div>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <i class="fa fa-heartbeat"></i>
                </button>
                <a class="navbar-brand" href="../index.php"><i class="fa fa-home"></i> 메인으로 돌아가기</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <div class="jumbotron navStatus">
                    <h3>나눔은 사랑입니다</h3>
                    <h4><i class="fa fa-heart"></i> 내가 나눠준 하트 <?php echo $mHeartGiven; ?>개</h4>
                    <h4><i class="fa fa-heart-o"></i> 내가 보유한 하트 <?php echo $mHeartTaken; ?>개</h4>
                </div>
            </div>
        </div>
    </nav>
    <div class="nav_overlay"></div>
    <div class="container topMargin mealBody">
        <img class="cooking" src="../img/cooking.png" />
        <h3>함께 살찌는 메뉴</h3>
        <p>(*메뉴에 변동이 있을 수 있습니다)</p>
        <br />
        <h4 class="fridayN">금요일 야식</h4>
        <p>떡꼬치</p>
        <p>어묵우동</p>
        <br />
        <h4 class="saturdayB">토요일 아침</h4>
        <p>에그 스크램블 / 계란 후라이</p>
        <p>베이컨 / 햄</p>
        <p>빵 / 잼</p>
        <p>우유 / 오렌지 주스</p>
        <br />
        <h4 class="saturdayL">토요일 점심</h4>
        <p>볶음밥</p>
        <p>미소숲</p>
        <br />
        <h4 class="saturdayD">토요일 저녁</h4>
        <p>닭갈비</p>
        <p>동치미</p>
        <p>주먹밥</p>
        <br />
        <h4 class="saturdayN">토요일 야식</h4>
        <p>쫄면</p>
        <p>만두</p>
        <br />
        <h4 class="sundayB">주일 아침</h4>
        <p>길거리 토스트</p>
    </div>
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script defer src="https://code.getmdl.io/1.1.1/material.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="../js/config.js"></script>
    <script src="../js/script.js"></script>
    <script>
        $(function () {
            var parts = window.location.search.substr(1).split("&");
            var $_GET = {};
            for (var i = 0; i < parts.length; i++) {
                var temp = parts[i].split("=");
                $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
            }

            if($_GET['type'] != 'undefined' && $_GET['type'] != '') {
                $('body').stop().animate({
                    scrollTop: $('.' + $_GET['type']).offset().top - 80
                }, 2000, "swing");
            }
        });
    </script>
</body>

</html>
