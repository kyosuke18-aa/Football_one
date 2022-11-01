<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/login_form.css">
</head>

<body>
    <div class="body">

        <div class="form">
            <h2>ログインフォーム</h2>
            <form action="./login.php" method="post">
                <h4>メールアドレス</h4>
                <input type="text" name="email" placeholder="maill" required>
                <h4>パスワード</h4>
                <input type="password" name="password" placeholder="password" required>
                <br>
                <button type="login">ログイン</button>
            </form>

            <p><a href="../register/register_form.php">アカウント作成の方はこちら</a></p>
        </div>

    </div>
</body>

</html>