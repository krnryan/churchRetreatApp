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
    $today = time();
    // 1455868800 for Friday
    // 1455955200 for Saturday
    // 1456041600 for Sunday
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
    </head>

    <body>
        <i class="fa fa-book qtBody"></i>
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
        <div class="container topMargin qtCont">
            <?php if($today < 1455955200) { ?>
            <h3>매일성경 QT</h3>
            <p class="subTitle">큐티가 너무 하고 싶었구나?!</p>
            <p class="subTitle">하지만, 큐티는 내일 아침부터!</p>
            <img class="sorryClosed" src="img/closed.png" />
            <?php } elseif($today < 1456041600) { ?>
            <h3>매일성경 QT (<?php echo date('m월 d일 토', 1455955200); ?>)</h3>
            <p class="subTitle">좁은 문이 곧 닫힙니다 [ 누가복음 13:22 - 13:35 ]</p><br>
            <p>예루살렘 여행의 목적이 점점 드러납니다. 구원으로 인도하는 좁은 문은 곧 닫힐 것이고, 예수님은 자신보다 황폐하여 버려질 예루살렘의 안위를 염려하십니다.</p><br>
            <h4>곧 닫힐 하나님 나라</h4>
            <p><b>22절</b>  예수께서 각 성 각 마을로 다니사 가르치시며 예루살렘으로 여행하시더니 <b>23절</b>  어떤 사람이 여짜오되 주여 구원을 받는 자가 적으니이까 그들에게 이르시되 <b>24절</b>  좁은 문으로 들어가기를 힘쓰라 내가 너희에게 이르노니 들어가기를 구하여도 못하는 자가 많으리라 <b>25절</b>  집 주인이 일어나 문을 한 번 닫은 후에 너희가 밖에 서서 문을 두드리며 주여 열어 주소서 하면 그가 대답하여 이르되 나는 너희가 어디에서 온 자인지 알지 못하노라 하리니 <b>26절</b>  그 때에 너희가 말하되 우리는 주 앞에서 먹고 마셨으며 주는 또한 우리의 길거리에서 가르치셨나이다 하나 <b>27절</b>  그가 너희에게 말하여 이르되 나는 너희가 어디에서 왔는지 알지 못하노라 행악하는 모든 자들아 나를 떠나 가라 하리라 <b>28절</b>  너희가 아브라함과 이삭과 야곱과 모든 선지자는 하나님 나라에 있고 오직 너희는 밖에 쫓겨난 것을 볼 때에 거기서 슬피 울며 이를 갈리라 <b>29절</b>  사람들이 동서남북으로부터 와서 하나님의 나라 잔치에 참여하리니 <b>30절</b>  보라 나중 된 자로서 먼저 될 자도 있고 먼저 된 자로서 나중 될 자도 있느니라 하시더라</p><br>
            <h4>곧 황폐하게 될 예루살렘</h4>
            <p><b>31절</b>  곧 그 때에 어떤 바리새인들이 나아와서 이르되 나가서 여기를 떠나소서 헤롯이 당신을 죽이고자 하나이다 <b>32절</b>  이르시되 너희는 가서 저 여우에게 이르되 오늘과 내일은 내가 귀신을 쫓아내며 병을 고치다가 제삼일에는 완전하여지리라 하라 <b>33절</b>  그러나 오늘과 내일과 모레는 내가 갈 길을 가야 하리니 선지자가 예루살렘 밖에서는 죽는 법이 없느니라 <b>34절</b>  예루살렘아 예루살렘아 선지자들을 죽이고 네게 파송된 자들을 돌로 치는 자여 암탉이 제 새끼를 날개 아래에 모음 같이 내가 너희의 자녀를 모으려 한 일이 몇 번이냐 그러나 너희가 원하지 아니하였도다 <b>35절</b>  보라 너희 집이 황폐하여 버린 바 되리라 내가 너희에게 이르노니 너희가 주의 이름으로 오시는 이를 찬송하리로다 할 때까지는 나를 보지 못하리라 하시니라</p>

            <?php } else { ?>

            <h3>매일성경 QT (<?php echo date('m월 d일 일', 1456041600); ?>)</h3>
            <p class="subTitle">높은 자리에 앉는 사람들 [ 누가복음 14:1 - 14:14 ]</p><br>
            <p>바리새인의 계략을 아시면서도 초대에 응하십니다. 하지만 거짓으로 시작된 식사 자리는 진리가 선포되는 자리로 변합니다.</p><br>
            <h4>위선적인 종교 지도자들</h4>
            <p><b>1절</b>  안식일에 예수께서 한 바리새인 지도자의 집에 떡 잡수시러 들어가시니 그들이 엿보고 있더라 <b>2절</b>  주의 앞에 수종병 든 한 사람이 있는지라 <b>3절</b>  예수께서 대답하여 율법교사들과 바리새인들에게 이르시되 안식일에 병 고쳐 주는 것이 합당하냐 아니하냐 <b>4절</b>  그들이 잠잠하거늘 예수께서 그 사람을 데려다가 고쳐 보내시고 <b>5절</b>  또 그들에게 이르시되 너희 중에 누가 그 아들이나 소가 우물에 빠졌으면 안식일에라도 곧 끌어내지 않겠느냐 하시니 <b>6절</b>  그들이 이에 대하여 대답하지 못하니라 </p><br>
            <h4>자기를 높이는 손님들과 보상을 기대하는 초청인</h4>
            <p><b>7절</b>  청함을 받은 사람들이 높은 자리 택함을 보시고 그들에게 비유로 말씀하여 이르시되 <b>8절</b>  네가 누구에게나 혼인 잔치에 청함을 받았을 때에 높은 자리에 앉지 말라 그렇지 않으면 너보다 더 높은 사람이 청함을 받은 경우에 <b>9절</b>  너와 그를 청한 자가 와서 너더러 이 사람에게 자리를 내주라 하리니 그 때에 네가 부끄러워 끝자리로 가게 되리라 <b>10절</b>  청함을 받았을 때에 차라리 가서 끝자리에 앉으라 그러면 너를 청한 자가 와서 너더러 벗이여 올라 앉으라 하리니 그 때에야 함께 앉은 모든 사람 앞에서 영광이 있으리라 <b>11절</b>  무릇 자기를 높이는 자는 낮아지고 자기를 낮추는 자는 높아지리라 <b>12절</b>  또 자기를 청한 자에게 이르시되 네가 점심이나 저녁이나 베풀거든 벗이나 형제나 친척이나 부한 이웃을 청하지 말라 두렵건대 그 사람들이 너를 도로 청하여 네게 갚음이 될까 하노라 <b>13절</b>  잔치를 베풀거든 차라리 가난한 자들과 몸 불편한 자들과 저는 자들과 맹인들을 청하라 <b>14절</b>  그리하면 그들이 갚을 것이 없으므로 네게 복이 되리니 이는 의인들의 부활시에 네가 갚음을 받겠음이라 하시더라</p>

            <?php } ?>
        </div>
        <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script defer src="https://code.getmdl.io/1.1.1/material.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="js/script.js"></script>
    </body>

    </html>
