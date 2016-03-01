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
    <link rel="stylesheet" type="text/css" href="../css/slick.css">
</head>

<body>
    <i class="fa fa-quote-right memorizeBody"></i>
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
    <div class="container topMargin memorizeCont">
        <h3>암송 구절</h3>
        <div class="carousel">
            <div class="single-item">
                <div>
                    <h4>둘째날 아침</h4>
                    <p><b>(요 4:13-14)</b> 예수께서 대답하여 이르시되 이 물을 마시는 자마다 다시 목마르려니와 내가 주는 물을 마시는 자는 영원히 목마르지 아니하리니 내가 주는 물은 그 속에서 영생하도록 솟아나는 샘물이 되리라</p>
                    <p><b>(John 4:13-14)</b> Jesus answered, "Everyone who drinks this water will be thirsty again, but whoever drinks the water I give him will never thirst. Indeed, the water I give him will become in him a spring of water</p>
                </div>
                <div>
                    <h4>둘째날 점심</h4>
                    <p><b>(빌 2:5-6)</b> 너희 안에 이 마음을 품으라 곧 그리스도 예수의 마음이니 그는 근본 하나님의 본체시나 하나님과 동등됨을 취할 것으로 여기지 아니하시고</p>
                    <p><b>(Php 2:5-6)</b> Your attitude should be the same as that of Christ Jesus： Who, being in very nature God, did not consider equality with God something to be grasped</p>
                </div>
                <div>
                    <h4>둘째날 저녁</h4>
                    <p><b>(빌 2:7-8)</b> 오히려 자기를 비워 종의 형체를 가지사 사람들과 같이 되셨고 사람의 모양으로 나타나사 자기를 낮추시고 죽기까지 복종하셨으니 곧 십자가에 죽으심이라</p>
                    <p><b>(Php 2:7-8)</b> but made himself nothing, taking the very nature of a servant, being made in human likeness. And being found in appearance as a man, he humbled himself and became obedient to death--even death on a cross!
</p>
                </div>
            </div>
        </div>
        <a id="kakao-link-btn" href="javascript:sendLink()">
            <div class="jumbotron"><i class="fa fa-share-alt"></i>  암송 구절 공유하기</div>
        </a>
    </div>
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script defer src="https://code.getmdl.io/1.1.1/material.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="../js/config.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/slick.js"></script>
    <script src="http://developers.kakao.com/sdk/js/kakao.min.js"></script>
    <script>
        Kakao.init('7b6db9e1ed73a6cfbd92fd2607614b20 ');

        function sendLink() {
            var bibleVerse = $('.slick-current').text();
            Kakao.Link.sendTalkLink({
                label: bibleVerse
            });
        }

        $(document).ready(function () {
            $('.single-item').slick({
                infinite: false,
                dots: true,
                arrows: false
            });
        });
    </script>
</body>

</html>
