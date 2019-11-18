<?php
require_once 'functions.php';
require_logined_session();
header('Content-Type:text/html; charset=UTF-8');
require 'db.php';
if(isset($_GET['class_id'])){
    $class_id=$_GET['class_id'];
}else{
    //login.phpから飛んできた1行目のclass_idが入る。
    var_dump($_SESSION);
    $class_id=$_SESSION['class']['id'][0];
}
$student = prepareQuery("select * from load_responsible_1 where class_id = ?",[$class_id]);
try{
}catch (PDOException $exception){
    die('接続エラー:'.$exception->getMessage());
}
try{
}catch (PDOException $exception){
    die('接続エラー:'.$exception->getMessage());
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css">
    <link rel="stylesheet" media="all" href="../CSS/All.css">
    <link rel="stylesheet" media="all" href="../CSS/Responsible.css">
    <link rel="stylesheet" media="all" href="../CSS/Style.css">
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <title>Responsible.html</title>
</head>
<body>
<!--どのアカウントで入ったか確認-->
<div class="header">
    <div class="title">
        <div class="title_text">
            <!--flex-grow: 3;-->
            <h1 class="head">
                <!-- 題名 -->
                状況管理
            </h1>
        </div>
    </div>
</div>
<!--    Jqueryのライブラリ-->
<script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!--momentのライブラリ（日付）-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/locale/ja.js"></script>
<script type="text/javascript">
    $(function () {
        $('#datepicker').datepicker({dateFormat: "yy-mm-dd"});
        $('#datepicker').datepicker("setDate",new Date());
        var now_jpn = moment();
    })
</script>
<!-- 先生の名前 -->
<a href="./TeacherPro.php" ><?php echo h($_SESSION['username']) ?></a>
<!-- 上のメニューバー -->
<div class="bu">
    <!--    <a href="AttendanceConfirmation.php" id="attend">状況管理</a>-->
</div>
<!--検索バー -->
<div class="container">
    <input type="text" placeholder="Search..." id="sa-ch">
    <div class="search"></div>
</div>
<div class="contents">
    <ul class="nav">
        <li><a href="./index.php">担当グループ</a></li>
        <li><a href="Group.php">グループ管理</a></li>
        <li><a href="Users.php">ユーザー検索</a></li>
        <li><a href="Resuser.php">管理者ユーザー一覧</a></li>
        <li><a href="Groupmake.php">グループ作成</a></li>
        <li><a href="Classroom.php">教室管理</a></li>
        <li><a href="./logout.php?token=<?=h(generate_token())?>">ログアウト</a></li>
    </ul>
</div>
<!--写真が入ります-->
<!--グラフに飛ぶよん-->
<form action="update.php" method="post">
    <input type="image" src="../image/noimage.gif">
    <p>
    <table>
        <tr>
            <th>出席番号</th>
            <th>名前</th>
            <th>出席率</th>
            <th>出席判定</th>
        </tr>
        <!-- exec_selectによる折り返し処理:開始 -->
        <?php foreach ($student as $st){ ?>
            <tr>
                <th><?=htmlspecialchars($st['student_num']) ?></th>
                <th><?=htmlspecialchars($st['student_name'])?></th>
                <td><?=htmlspecialchars($st['attend_rate']) ?></td><!-- 出席率 -->
                <td><php? ?></td><!--<th><?//=htmlspecialchars($row['累計の遅刻数'])?></th> -->
            </tr>
        <?php } $pdo=null; ?>
    </table>
    <!--            <input type="submit" value="決定">-->
    <button type=“submit”>決定</button>
</form>
◯人中◯人出席しました。
</body>
</html>