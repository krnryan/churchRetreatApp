<?php
    require_once 'db/config.php';
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
    <title>청2 수양회</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.timeline.css">
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
                    <h4><i class="fa fa-heart"></i> 내가 나눠준 하트 <?php echo $mHeartGiven; ?>개</h4>
                    <h4><i class="fa fa-heart-o"></i> 내가 보유한 하트 <?php echo $mHeartTaken; ?>개</h4>
                </div>
            </div>
        </div>
    </nav>
    <div class="nav_overlay"></div>
    <div class="container topMargin">
        <div class="jumbotron schedulealarm"></div>
        <div class="timelineCont">
            <h4>첫째날 (금)</h4>
            <div id="timeline-dayone"></div>
            <h4>둘째날 (토)</h4>
            <div id="timeline-daytwo"></div>
            <h4>셋째날 (일)</h4>
            <div id="timeline-daythree"></div>
        </div>
    </div>
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script defer src="https://code.getmdl.io/1.1.1/material.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <script src="js/jquery.timeline.js"></script>
    <script>
        $(function () {
            var rightnow = (new Date().getTime() / 1000).toFixed(0);
            var previousElem = '';
            var nextEvent = '';
            $('.tl-item').each(function () {
                if (rightnow >= $(this).attr('timestamp')) {
                    if (previousElem !== '') {
                        previousElem.find('.tl-wrap').removeClass('currentEvent')
                    }
                    $(this).find('.tl-wrap').addClass('currentEvent');
                    previousElem = $(this);
                }
            });
            if(previousElem !== '') {
                if(previousElem.nextAll('.tl-item:first').find('.tl-wrap').length > 0) {
                    previousElem.nextAll('.tl-item:first').find('.tl-wrap').addClass('nextEvent');
                }
                $('.timelineCont').stop().animate({
                    scrollTop: $('.currentEvent').offset().top - 180
                }, 2000, "swing");
            } else {
                $('.tl-item:first').find('.tl-wrap').addClass('nextEvent');
            }

            if($('.currentEvent').length > 0) {
                $('.schedulealarm').append('<h5>지금은 ' + $('.currentEvent').find('.tl-content span').text() + ' 시간입니다.</h5>');
            }

            if($('.nextEvent').length > 0) {
                $('.schedulealarm').append('<h5>다음은 ' + $('.nextEvent').find('.tl-content span').text() + ' 시간입니다.</h5>');
            }
        });
        $("#timeline-dayone").timeline({
            data: [{
                time: new Date("February 19, 2016 20:30"),
                content: '<i class="fa fa-pencil-square-o"></i> <span>체크인 및 조배정</span>'
            }, {
                time: new Date("February 19, 2016 21:00"),
                content: '<i class="fa fa-leaf"></i> <span>예배</span><br>(주님과의 인격적인 만남)'
            }, {
                time: new Date("February 19, 2016 23:00"),
                content: '<i class="fa fa-briefcase"></i> <span>짐정리</span>'
            }, {
                time: new Date("February 19, 2016 23:30"),
                content: '<i class="fa fa-users"></i> <span>조별모임<br>& 야식</span> (<a href="meal.php?type=fridayN">메뉴 보기</a>)'
            }, {
                time: new Date("February 20, 2016 00:00"),
                content: '<i class="fa fa-bed"></i> <span>취침</span>'
            }]
        });

        $("#timeline-daytwo").timeline({
            data: [{
                time: new Date("February 20, 2016 07:00"),
                content: '<i class="fa fa-book"></i> <span>큐티</span><br>(<a href="qt.php">좁은 문이 곧 닫힙니다</a>)'
            }, {
                time: new Date("February 20, 2016 07:30"),
                content: '<i class="fa fa-tint"></i> <span>세면 및 휴식</span>'
            }, {
                time: new Date("February 20, 2016 08:00"),
                content: '<i class="fa fa-cutlery"></i> <span>아침식사</span> (<a href="meal.php?type=saturdayB">메뉴 보기</a>)'
            }, {
                time: new Date("February 20, 2016 09:30"),
                content: '<i class="fa fa-music"></i> <span>찬양</span>'
            }, {
                time: new Date("February 20, 2016 10:00"),
                content: '<i class="fa fa-key"></i> <span>특강</span><br>정혜림 사모님<br>(만남의 축복을 꿈꾸며)'
            }, {
                time: new Date("February 20, 2016 11:30"),
                content: '<i class="fa fa-users"></i> <span>조별모임</span>'
            }, {
                time: new Date("February 20, 2016 12:00"),
                content: '<i class="fa fa-cutlery"></i> <span>점심식사<br>& 휴식</span> (<a href="meal.php?type=saturdayL">메뉴 보기</a>)'
            }, {
                time: new Date("February 20, 2016 13:30"),
                content: '<i class="fa fa-gamepad"></i> <span>오형익의 토론</span>'
            }, {
                time: new Date("February 20, 2016 14:15"),
                content: '<i class="fa fa-gamepad"></i> <span>Cross the line</span>'
            }, {
                time: new Date("February 20, 2016 14:45"),
                content: '<i class="fa fa-gamepad"></i> <span>조별 게임</span>'
            }, {
                time: new Date("February 20, 2016 16:30"),
                content: '<i class="fa fa-user"></i> <span>개인 휴식</span>'
            }, {
                time: new Date("February 20, 2016 17:30"),
                content: '<i class="fa fa-users"></i> <span>조별모임</span>'
            }, {
                time: new Date("February 20, 2016 18:00"),
                content: '<i class="fa fa-cutlery"></i> <span>저녁식사</span> (<a href="meal.php?type=saturdayD">메뉴 보기</a>)'
            }, {
                time: new Date("February 20, 2016 19:30"),
                content: '<i class="fa fa-hourglass"></i> <span>솔리튜드</span>'
            }, {
                time: new Date("February 20, 2016 20:30"),
                content: '<i class="fa fa-leaf"></i> <span>예배</span><br>(이웃과의 따듯한 만남)'
            }, {
                time: new Date("February 20, 2016 23:30"),
                content: '<i class="fa fa-users"></i> <span>조별모임<br>& 야식</span> (<a href="meal.php?type=saturdayN">메뉴 보기</a>)'
            }, {
                time: new Date("February 21, 2016 00:00"),
                content: '<i class="fa fa-bed"></i> <span>취침</span>'
            }]
        });

        $("#timeline-daythree").timeline({
            data: [{
                time: new Date("February 21, 2016 07:30"),
                content: '<i class="fa fa-book"></i> <span>큐티</span><br>(<a href="qt.php">높은 자리에 앉는 사람들</a>)'
            }, {
                time: new Date("February 21, 2016 08:00"),
                content: '<i class="fa fa-cutlery"></i> <span>아침식사</span> (<a href="meal.php?type=sundayB">메뉴 보기</a>)'
            }, {
                time: new Date("February 21, 2016 09:00"),
                content: '<i class="fa fa-fire"></i> <span>간증</span>'
            }, {
                time: new Date("February 21, 2016 10:00"),
                content: '<i class="fa fa-camera-retro"></i> <span>뒷정리 및 단체사진</span>'
            }, {
                time: new Date("February 21, 2016 11:00"),
                content: '<i class="fa fa-taxi"></i> <span>체크아웃</span>'
            }]
        });
    </script>
</body>

</html>
