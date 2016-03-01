<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once '../db/config.php';
    $data = [];
    $data2 = [];
    $result = mysqli_query($con, "SELECT * FROM member WHERE `group` = " . $_GET['group']);
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
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <?php
            echo '<script>var myHeartGiven = ' . $myHeartGiven . '; var myHeartTaken = ' . $myHeartTaken . '</script>';
        ?>
    </head>

    <body>
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
                        <h4><i class="fa fa-heart"></i> 내가 나눠준 하트 <?php echo $myHeartGiven; ?>개</h4>
                        <h4><i class="fa fa-heart-o"></i> 내가 보유한 하트 <?php echo $myHeartTaken; ?>개</h4>
                    </div>
                </div>
            </div>
        </nav>
        <div class="nav_overlay"></div>
        <div class="jumbotron heartPopup closePopup">
            <h5><span class="toWhom"></span>에게 하트를 보냅니다</h5>
            <button type="button" class="btn btn-default sendHeart">나누기</button>
            <button type="button" class="btn btn-default closeWarning">취소</button>
        </div>
        <div class="jumbotron warningPopup closePopup">
            <h5></h5>
            <button type="button" class="btn btn-default closeHeart">확인</button>
        </div>
        <div class="jumbotron diffGroupPopup closePopup">
            <a href="group.php?group=1">
                <div class="groups ripplelink" style="background-color: #F5815A">
                    <span>1</span>
                    <p>1조</p>
                </div>
            </a>
            <a href="group.php?group=2">
                <div class="groups ripplelink" style="background-color: #f5b260">
                    <span>2</span>
                    <p>2조</p>
                </div>
            </a>
            <a href="group.php?group=3">
                <div class="groups ripplelink" style="background-color: #95d7e3">
                    <span>3</span>
                    <p>3조</p>
                </div>
            </a>
            <a href="group.php?group=4">
                <div class="groups ripplelink" style="background-color: #F5815A">
                    <span>4</span>
                    <p>4조</p>
                </div>
            </a>
            <a href="group.php?group=5">
                <div class="groups ripplelink" style="background-color: #f5b260">
                    <span>5</span>
                    <p>5조</p>
                </div>
            </a>
            <a href="group.php?group=6">
                <div class="groups ripplelink" style="background-color: #95d7e3">
                    <span>6</span>
                    <p>6조</p>
                </div>
            </a>
            <a href="group.php?group=0">
                <div class="groups specialgroup ripplelink" style="background-color: #F5815A">
                    <span>0</span>
                    <p>목사님 &amp; 사모님</p>
                </div>
            </a>
        </div>
        <div class="popup_overlay"></div>
        <div class="container topMargin">
            <?php
            if($_COOKIE['chung2Group'] !== $_GET['group']) {
                echo '<a href="group.php?group=' . $_COOKIE['chung2Group'] . '">
                    <div class="jumbotron ripplelink returnGroup">
                        <p><i class="fa fa-child"></i> 우리 조로 돌아가기</p>
                    </div>
                </a>';
            }
            ?>
                <?php
                $patternSwitch = 'modd';
                $groupLeader = '없음';
                $gHeartTaken = 0;
                $gHeartGiven = 0;
                foreach($data as $member) {
                    if($member["level"] == 'c') {
                        $groupLeader = $member["name"];
                    }
                    $mHeartGiven = $member["heart_g"];
                    $mHeartTaken = $member["heart_t"];

                    $gHeartTaken = $gHeartTaken + $mHeartTaken;
                    $gHeartGiven = $gHeartGiven + $mHeartGiven;
                }
                echo '<div class="jumbotron captain ripplelink">
                    <h1>' . $_GET['group'] . '조
                        조장: ' . $groupLeader .
                    '</h1>
                    <img src="../img/captain-default.png" />
                </div>';
                foreach($data as $member) {
                    $mId = $member["id"];
                    $mName = $member["name"];
                    $mGender = $member["gender"];
                    $mGroup = $member["group"];
                    $mLevel = $member["level"];
                    echo '<div class="jumbotron giveheart memberHeart ripplelink" mName="' . $mName . '" mid="' . $mId . '" mGender="' . $mGender . '">';
                        echo '<i class="fa fa-heart"></i>';
                    echo '</div>';
                    if($mGender === 'f' || $mGender === 's') {
                        echo '<div class="jumbotron giveheart member-f ' . $patternSwitch . ' ripplelink" mName="' . $mName . '" mid="' . $mId . '" mGender="' . $mGender . '">';
                    } else {
                        echo '<div class="jumbotron giveheart member ' . $patternSwitch . ' ripplelink" mName="' . $mName . '" mid="' . $mId . '" mGender="' . $mGender . '">';
                    }
                        echo '<span>' . $mName . '</span>';
                    echo '</div>';
                    $patternSwitch = ($patternSwitch === 'modd') ? 'meven' : 'modd';
                }
            ?>
                    <div class="jumbotron ripplelink heartboard">
                        <?php
                        if($_COOKIE['chung2Group'] !== $_GET['group']) {
                            echo '<h4>' . $_GET['group'] . '조 하트 현황</h4>';
                        } else {
                            echo '<h4>우리조 하트 현황</h4>';
                        }
                        $team_bonus = 0;
                        if($_GET['group'] == 0) {
                            $team_bonus = 0;
                        } elseif ($_GET['group'] == 1) {
                            $team_bonus = 120 + 200 + 160;
                        } elseif ($_GET['group'] == 2) {
                            $team_bonus = 100 + 100 + 200 + 160;
                        } elseif ($_GET['group'] == 3) {
                            $team_bonus = 110 + 110 + 160;
                        } elseif ($_GET['group'] == 4) {
                            $team_bonus = 200 + 160 + 250;
                        } elseif ($_GET['group'] == 5) {
                            $team_bonus = 100 + 160 + 160;
                        } elseif ($_GET['group'] == 6) {
                            $team_bonus = 200 + 110 + 200;
                        }
                    ?>
                            <h4>총점수 <?php echo round(($gHeartGiven + $team_bonus)/$gHeartTaken*100,2); ?>점</h4>
                            <h5>조원들이 나눠준 하트: 총 <?php echo $gHeartGiven + $team_bonus; ?>개</h5>
                            <h5>조원들이 보유한 하트: 총 <?php echo $gHeartTaken; ?>개</h5>
                        <?php if($_COOKIE['chung2Group'] == $_GET['group']) { ?>
                            <div class="checkmyheart">
                                <h5>나의 하트 현황</h5>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="jumbotron popup otherGroup ripplelink">
                        <p><i class="fa fa-bicycle"></i> 다른 조에 놀러가기</p>
                    </div>
        </div>
        <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script defer src="https://code.getmdl.io/1.1.1/material.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="../js/config.js"></script>
        <script src="../js/script.js"></script>
        <script>
            $(function () {
                var request;
                var parts = window.location.search.substr(1).split("&");
                var $_GET = {};
                for (var i = 0; i < parts.length; i++) {
                    var temp = parts[i].split("=");
                    $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
                }

                $('body').on('click', '.checkmyheart', function () {
                    $('.navbar-toggle').click();
                });
                $('body').on('click', '.closeWarning', function () {
                    $('.popup_overlay').click();
                    $('.warningPopup h3').text('');
                });
                $('body').on('click', '.closeHeart', function () {
                    $('.popup_overlay').click();
                });
                $('body').on('click', '.sendHeart', function () {
                    $('.popup_overlay').click();
                    var data = {
                        'mid': $(this).attr('toWhom'),
                        'from': getCookie('chung2Regnum')
                    }
                    $.ajax({
                        type: 'POST',
                        url: '../ajax/giveheart.php',
                        data: data,
                        dataType: 'json'
                    }).always(function () {
                        location.href = 'heartsent.php?to=' + data.mid;
                    });
                });
                $('body').on('click', '.giveheart', function () {
                    <?php
                    $data5 = [];
                    $result5 = mysqli_query($con, "SELECT * FROM member WHERE `regnum` = " . $_COOKIE['chung2Regnum']);
                    $t = 0;
                    while($row5 = $result5->fetch_assoc()){
                        foreach($row5 as $key5=>$value5){
                            $data5[$t][$key5] = $value5;
                        }
                        $i++;
                    }
                    $myHeartTaken5 = $data5[0]["heart_t"];
                    ?>
                    if(<?php echo $myHeartTaken5; ?> < 1) {
                        setTimeout(function () {
                            $('.popup_overlay').css({
                                'display': 'block',
                                'z-index': '9000'
                            });
                            $('.warningPopup h5').text('나눌수 있는 하트가 없습니다');
                            $('.warningPopup').css('display', 'block');
                        }, 500);
                    } else {
                        if (getCookie('chung2Group') != $_GET['group']) {
                            var toWhom = $(this).attr('mName');
                            var toGender = $(this).attr('mGender');
                            var toId = $(this).attr('mId');
                            var mGenderIssued = "";
                            if (toGender == 'm') mGenderIssued = " 형제님";
                            if (toGender == 'f') mGenderIssued = " 자매님";
                            if (toGender == 'p') mGenderIssued = " 목사님";
                            if (toGender == 's') mGenderIssued = " 사모님";
                            setTimeout(function () {
                                $('.popup_overlay').css({
                                    'display': 'block',
                                    'z-index': '9000'
                                });
                                $('span.toWhom').text(toWhom + mGenderIssued);
                                $('.sendHeart').attr('toWhom', toId);
                                $('.heartPopup').css('display', 'block');
                            }, 500);
                        } else {
                            setTimeout(function () {
                                $('.popup_overlay').css({
                                    'display': 'block',
                                    'z-index': '9000'
                                });
                                $('.warningPopup h5').text('다른 조 조원들과 하트를 나눠보는건 어떨까요?');
                                $('.warningPopup').css('display', 'block');
                            }, 500);
                        }
                    }
                });
            });

            function getCookie(name) {
                var re = new RegExp(name + "=([^;]+)");
                var value = re.exec(document.cookie);
                return (value != null) ? unescape(value[1]) : null;
            }
        </script>
    </body>

    </html>
