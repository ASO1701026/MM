<?php



?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>responsible</title>
    </head>
    <body>
        <h1>状況管理</h1>
        <!--クラスメニュー-->
        <div class="class">
            <li>授業名
                <ul>
                    <li>プログラミング演習</li>
                </ul>
            </li>
        </div>

        <!--日付-->
        <script type="text/javascript">
            weeks=new Array("日","月","火","水","木","金","土");
            today=new Date();
            m=today.getMonth()+1;
            d=today.getDate();
            w=weeks[today.getDay()];
            document.write("<span>",m,"<\/span>月");
            document.write("<span>",d,"<\/span>日");
            document.write("(<span>",w,"<\/span>)");
        </script>

        <button type=“button”>担任</button>

        <!--メニューバー-->
        <div class="tabs">
            　<li><input id="responsible"  name="menu"><a href="Responsible.html">担当グループ</a></li>
            <li><input id="group" name="menu"><a href="Group.html">グループ管理</a></li>
            <li><input id="users" name="menu"><a href="Users.html">ユーザー検索</a></li>
            <li><input id="resuser" name="menu"><a href="Resuser.html">管理者ユーザー一覧</a></li>
            <li><input id="groupmake" name="menu"><a href="Groupmake.html">グループ作成</a></li>
            <li><input id="classroom" name="menu"><a href="Classroom.html">教室管理</a></li>
            <li><input id="classroom" name="menu"><a href="Logout.html">ログアウト</a></li>
        </div>


        <!--人の表情が入ります-->
        <input type="image" src="../image/face.png">

        <!--写真が入ります-->
        <!--グラフに飛ぶよん-->
        <form action="StudentGraph.html" method="post">
            <input type="image" src="../image/noimage.gif">

            <p>
                出席番号　名前　出席率
            <div class="menu">
                <ul>
                    　<li>遅刻</li>
                </ul>
            </div>

        </form>

        ◯人中◯人出席しました。

        <button type=“button”>決定</button>

    </body>
</html>
