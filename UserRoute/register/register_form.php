<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/register_form.css">
</head>
<body>
    <div class="body">

        <div class="form">
            <h2>アカウント新規登録</h2>

            <form action="./register.php" method="post">
                    <h4>Name</h4>
                    <input type="text" name="name" placeholder="名前を入力" required>
                    <h4>Email</h4>
                    <input type="text" name="email" placeholder="メールを入力" required>
                    <h4>Password</h4>
                    <input type="text" name="password" placeholder="パスワードを入力" required>
                    <br>
                    <button type="submit">登録</button>
            </form>

            <p><a href="../login/login_form.php">ログインフォーム</a></p>
        </div>

    </div>
</body>
</html>