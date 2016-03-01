<?php
    require_once '../db/config.php';
    require_once '../control/quest_list.php';
    $data = [];
    $allmembers = [];
    $result = mysqli_query($con, "SELECT * FROM member WHERE `regnum` = " . $_COOKIE['chung2Regnum']);
    $result2 = mysqli_query($con, "SELECT * FROM member");
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
            $allmembers[$a][$key2] = $value2;
        }
        $a++;
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
                        <h4><i class="fa fa-heart"></i> 내가 나눠준 하트 <?php echo $mHeartGiven; ?>개</h4>
                        <h4><i class="fa fa-heart-o"></i> 내가 보유한 하트 <?php echo $mHeartTaken; ?>개</h4>
                    </div>
                </div>
            </div>
        </nav>
        <div class="nav_overlay"></div>
        <div class="popup_overlay"></div>
        <div class="jumbotron questPopup closePopup">
            <form id="formform">
                <h4 class="questtitle"></h4>
                <h5><span class="toWhom"></span><span class="questinst"></span></h5>
                <h5>완료시 <i class="fa fa-heart"></i> x <span class="heartcount"></span> 서로에게 지급</h5>
                <input class="form-control" type="number" id="regnumcheck" name="regnumcheck" value="regnumcheck" placeholder="상대방 등록번호" />
                <button type="button" class="btn btn-default sendHeart">퀘스트 완료</button>
                <button type="button" class="btn btn-default closeWarning">퀘스트 취소</button>
            </form>
        </div>
        <div class="container topMargin questBody">
            <h2>하트 충전소</h2>
            <div class="jumbotron">
                <h5>하트 충전소는 조별 점수를 올릴수 있는 하트를 퀘스트를 통해 획득할 수 있는 곳입니다. 퀘스트를 상대방과 함께 완료한 후 상대방의 등록번호를 입력하면 서로에게 하트가 지급됩니다. 단, 서로 자신의 등록번호를 공유해서는 절대 안됩니다. 예수님의 사랑처럼 공동체의 사랑은 나눌수록 배가 됩니다!<br><br><span style="color: red;">(충전소를 재로딩시 퀘스트가 다시 리셋됩니다)</span></h5>
            </div>
            <br>
            <?php
                $colorChange = "questColor";
                $firstNum = 0;
                $secondNum = 0;
                $skipthis = false;
                $skipthat = false;
                if ($_COOKIE['chung2Regnum'] == '800424') $skipthis = true;
                if ($_COOKIE['chung2Regnum'] == '810106') $skipthat = true;
                for($q = 0; $q < 3; $q++) {
                    $t = 1;
                    do {
                        $randomQuest = rand(0, count($quest) - 1);
                        if($skipthis || $skipthat) {
                            if ($randomQuest < 14) {
                                $t++;
                            } else {
                                break;
                            }
                        } else {
                            break;
                        }
                    } while ($t > 0);
                    $regnum;
                    $genderIssue = '';
                    $withWho = '';
                    if ($randomQuest < 8) {
                        $regnum = 800424; // 목사님
                    } elseif ($randomQuest < 14) {
                        $regnum = 810106; // 사모님
                    } else {
                        $k = 1;
                        do {
                            $randomMember = rand(0, count($allmembers) - 1);
                            if ($allmembers[$randomMember]["regnum"] == $_COOKIE['chung2Regnum'] || $allmembers[$randomMember]["group"] == $_COOKIE['chung2Group']) {
                                $k++;
                            } else {
                                break;
                            }
                        } while ($k > 0);
                        $withWho = $allmembers[$randomMember]["name"];
                        $regnum = $allmembers[$randomMember]["regnum"];
                        $withgender = $allmembers[$randomMember]["gender"];
                        if ($withgender == 'm') $genderIssue = " 형제님";
                        if ($withgender == 'f') $genderIssue = " 자매님";
                        if ($withgender == 'p') $genderIssue = " 목사님";
                        if ($withgender == 's') $genderIssue = " 사모님";
                    }
                    echo '
                    <div class="jumbotron giveheart questHeart ripplelink" regnum="' . $regnum . '" title="' . $quest[$randomQuest]["title"] . '" inst="' . $quest[$randomQuest]["inst"] . '" heart="' . $quest[$randomQuest]["heart"] . '" with="' . $withWho . '" gender="' . $genderIssue . '">
                        <i class="fa fa-heart"></i>
                    </div>
                    <div class="jumbotron giveheart quest ripplelink ' . $colorChange . '" regnum="' . $regnum . '" title="' . $quest[$randomQuest]["title"] . '" inst="' . $quest[$randomQuest]["inst"] . '" heart="' . $quest[$randomQuest]["heart"] . '" with="' . $withWho . '" gender="' . $genderIssue . '">
                        <span>' . $quest[$randomQuest]["title"] . '</span>
                    </div>';
                    if($colorChange == "questColor") $colorChange = "";
                    elseif($colorChange == "") $colorChange = "questColor";
                }
            ?>
        </div>
        <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script defer src="https://code.getmdl.io/1.1.1/material.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="../js/config.js"></script>
        <script src="../js/script.js"></script>
        <script>
            $(function () {
                $('body').on('click', '.quest, .questHeart', function () {
                    var opporegnum = $(this).attr('regnum');
                    var oppotitle = $(this).attr('title');
                    var oppoinst = $(this).attr('inst');
                    var oppowith = $(this).attr('with');
                    var oppogender = $(this).attr('gender');
                    var oppoheart = $(this).attr('heart');
                    setTimeout(function () {
                        $('.popup_overlay').css({
                            'display': 'block',
                            'z-index': '9000'
                        });
                        $('.questtitle').text(oppotitle);
                        $('.toWhom').text(oppowith + oppogender);
                        $('.questinst').text(oppoinst);
                        $('.heartcount').text(oppoheart);
                        $('.sendHeart').attr('heart', oppoheart);
                        $('.sendHeart').attr('regnum', opporegnum);
                        $('.questPopup').css('display', 'block');
                    }, 500);
                });
                $('body').on('click', '.closeWarning', function () {
                    $('.popup_overlay').click();
                });
                $('body').on('click', '.sendHeart', function () {
                    if($('#regnumcheck').val() == $(this).attr('regnum')) {
                        document.getElementById("formform").reset();
                        $('.popup_overlay').click();
                        var data = {
                            'heart': $(this).attr('heart'),
                            'regnum': getCookie('chung2Regnum'),
                            'opporegnum': $(this).attr('regnum'),
                            'opponame': $('.toWhom').text()
                        }
                        $.ajax({
                            type: 'POST',
                            url: '../ajax/receiveheart.php',
                            data: data,
                            dataType: 'json'
                        }).always(function () {
                            location.href = 'heartreceived.php?heart=' + data.heart + '&you=' + data.opponame;
                        });
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
