<!DOCTYPE html>
<html lang="kr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0, user-scalable=no">
    <title>청3 수양회</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <?php if(isset($_COOKIE['chung2Regnum'])) { ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <?php } ?>
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
    <?php
        require_once 'db/config.php';
        $n = 0;
        $notice = [];
        $isNotice = false;
        $res = mysqli_query($con, "SELECT * FROM announcement ORDER BY id DESC LIMIT 0, 1");
        if($res->num_rows > 0) {
            $isNotice = true;
            while($row = $res->fetch_assoc()){
                foreach($row as $key=>$value){
                    $notice[$n][$key] = $value;
                }
                $n++;
            }
        }
        $w = 0;
        $winner = [];
        $res_win = mysqli_query($con, "SELECT * FROM member ORDER BY heart_g DESC LIMIT 0, 1");
        if($res_win->num_rows > 0) {
            while($row_win = $res_win->fetch_assoc()){
                foreach($row_win as $key=>$value){
                    $winner[$w][$key] = $value;
                }
                $w++;
            }
        }
        if(!isset($_COOKIE['chung2Regnum'])) {
            echo '<link rel="stylesheet" href="https://code.getmdl.io/1.1.1/material.blue-light_blue.min.css" />';
            if(!isset($_GET['passcode'])) {
                    echo '<div id="registerOverlay">
                        <div class="registerContainer">
                            <img src="img/iconRotate.gif" />
                            <form method="get" action="index.php">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" id="passcode" name="passcode" maxlength="6">
                                    <label class="mdl-textfield__label" for="passcode">청3 수양회 등록번호</label>
                                </div>
                                <button class="submitBtn mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
                                    확인
                                </button>
                            </form>
                        </div>
                    </div>';
            } else {
                $result = $con->query("SELECT * FROM member WHERE `regnum` = " . $_GET['passcode']);
                if($result && $result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $myGroup = $row['group'];
                    }
                    echo '<script>window.location="ajax/authorize.php?passcode=' . $_GET['passcode'] . '&group=' . $myGroup . '";</script>';
                } else {
                    echo '<div id="registerOverlay">
                        <div class="registerContainer">
                            <img src="img/iconRotate.gif" />
                            <p class="wrongNum">잘못된 번호입니다</p>
                            <form method="get" action="index.php">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" id="passcode" name="passcode" maxlength="6">
                                    <label class="mdl-textfield__label" for="passcode">청3 수양회 등록번호</label>
                                </div>
                                <button class="submitBtn mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
                                    확인
                                </button>
                            </form>
                        </div>
                    </div>';
                }
            }
        } else {
            $data = [];
            $result = $con->query("SELECT * FROM member WHERE `regnum` = " . $_COOKIE['chung2Regnum']);
            $i = 0;
            if($result->num_rows == 0) {
                echo '<link rel="stylesheet" href="https://code.getmdl.io/1.1.1/material.blue-light_blue.min.css" />';
                if(!isset($_GET['passcode'])) {
                        echo '<div id="registerOverlay">
                            <div class="registerContainer">
                                <img src="img/iconRotate.gif" />
                                <form method="get" action="index.php">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" id="passcode" name="passcode" maxlength="6">
                                        <label class="mdl-textfield__label" for="passcode">청3 수양회 등록번호</label>
                                    </div>
                                    <button class="submitBtn mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
                                        확인
                                    </button>
                                </form>
                            </div>
                        </div>';
                } else {
                    $result = $con->query("SELECT * FROM member WHERE `regnum` = " . $_GET['passcode']);
                    if($result && $result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $myGroup = $row['group'];
                        }
                        echo '<script>window.location="ajax/authorize.php?passcode=' . $_GET['passcode'] . '&group=' . $myGroup . '";</script>';
                    } else {
                        echo '<div id="registerOverlay">
                            <div class="registerContainer">
                                <img src="img/iconRotate.gif" />
                                <p class="wrongNum">잘못된 번호입니다</p>
                                <form method="get" action="index.php">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" id="passcode" name="passcode" maxlength="6">
                                        <label class="mdl-textfield__label" for="passcode">청3 수양회 등록번호</label>
                                    </div>
                                    <button class="submitBtn mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
                                        확인
                                    </button>
                                </form>
                            </div>
                        </div>';
                    }
                }
            } else {
            while($row = $result->fetch_assoc()){
                foreach($row as $key=>$value){
                    $data[$i][$key] = $value;
                }
                $i++;
            }
            $admin = false;
            $mName = $data[0]["name"];
            $mGender = $data[0]["gender"];
            $mGroup = $data[0]["group"];
            $mHeartGiven = $data[0]["heart_g"];
            $mHeartTaken = $data[0]["heart_t"];
            $mLevel = $data[0]["level"];
            $mRegnum = $data[0]["regnum"];

            $mGenderIssued = "";
            if ($mGender == 'm') $mGenderIssued = " 형제님";
            if ($mGender == 'f') $mGenderIssued = " 자매님";
            if ($mGender == 'p') $mGenderIssued = " 목사님";
            if ($mGender == 's') $mGenderIssued = " 사모님";

            // For admin
            if ($mRegnum == '800424' || $mRegnum == '880103') $admin = true;

    ?>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <i class="fa fa-heartbeat"></i>
                    </button>
                    <a class="navbar-brand" href="#">청3 수양회 "청지기"</a>
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
        <div class="container topMargin">
            <div class="ripplelink jumbotron jumbotronRMC1 unselectable">
                <h1>Hello, <?php echo $mName . $mGenderIssued . '.'; ?></h1>
            </div>
            <div class="ripplelink jumbotron jumbotronRMC1 unselectable winner">
                <p>
                    <?php echo '기부왕! ' . $winner[0]["name"] . '! '; ?>
                </p>
                <i class="fa fa-trophy"></i>
            </div>
            <?php if($isNotice) { ?>
                <a href="pages/announcement.php?id=<?php echo $notice[0]["id"]; ?>">
                    <div class="ripplelink jumbotron jumbotronNotice unselectable">
                        <p>
                            <?php echo $notice[0]["title"]; ?>
                        </p>
                        <i class="fa fa-bullhorn"></i>
                    </div>
                </a>
            <?php } ?>
            <?php if($admin) { ?>
                <a href="admin/announce.php">
                    <div class="ripplelink jumbotron jumbotronRMCspec1 unselectable">
                        <p>광고하기</p>
                        <i class="fa fa-bullhorn"></i>
                    </div>
                </a>
                <a href="pages/overlook.php">
                    <div class="ripplelink jumbotron jumbotronRMCspec2 unselectable">
                        <p>전체보기</p>
                        <i class="fa fa-cloud"></i>
                    </div>
                </a>
                <?php } ?>
                    <a href="pages/schedule.php">
                        <div class="ripplelink jumbotron jumbotronRMC2 unselectable">
                            <p>시간표</p>
                            <i class="fa fa-clock-o"></i>
                        </div>
                    </a>
                    <a href="pages/qt.php">
                        <div class="ripplelink jumbotron jumbotronRMC3 unselectable">
                            <p>큐티</p>
                            <i class="fa fa-book"></i>
                        </div>
                    </a>
                    <a href="pages/meal.php">
                        <div class="ripplelink jumbotron jumbotronRMC4 unselectable">
                            <p>식사</p>
                            <i class="fa fa-cutlery"></i>
                        </div>
                    </a>
                    <a href="pages/quest.php">
                        <div class="ripplelink jumbotron jumbotronRMC5 unselectable">
                            <p>하트 충전소</p>
                            <i class="fa fa-heart"></i>
                        </div>
                    </a>
                    <a href="pages/memorize.php">
                        <div class="ripplelink jumbotron jumbotronRMC6 unselectable">
                            <p>암송</p>
                            <i class="fa fa-quote-right"></i>
                        </div>
                    </a>
                    <a href="pages/group.php?group=<?php echo $mGroup; ?>">
                        <div class="ripplelink jumbotron jumbotronRMC7 unselectable">
                            <p>
                                <?php echo '우리 ' . $mGroup . '조'; ?>
                            </p>
                            <i class="fa fa-users"></i>
                        </div>
                    </a>
        </div>
        <?php
            }
        }
    ?>
            <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
            <script defer src="https://code.getmdl.io/1.1.1/material.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
            <script src="js/config.js"></script>
            <script src="js/script.js"></script>
</body>

</html>
