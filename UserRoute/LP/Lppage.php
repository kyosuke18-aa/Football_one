<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football Expected Site</title>

    <!-- bootstrapインポート -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./Lp.css">

    <style>
        .main {
            background: url('../img/フリー素材.jpeg') no-repeat center;
            background-size: cover;
            width: 100%;
            height: 250px;
            position: relative;
            background-attachment: fixed;
        }

        .test {
            background-color: black;
        }

        .logo {
            border-radius: 30px;
        }

        .atag:hover {
            color: rgb(138, 171, 243);
        }
    </style>
</head>

<body>
    <header class="sticky-top">
        <nav class="test navbar navbar-expand-lg text-white py-4">
            <div class="container">
                <h1 class="navbar-brand text-white fs-2">
                    <img src="../img/header-logo.jpg" alt="" width="40" height="35" class="logo d-inline-block
                                align-text-top" style="object-fit: cover;"> Football Expected Site
                </h1>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="atag nav-item">
                            <a class="link-primary nav-link text-white" href="../register/register_form.php">新規登録</a>
                        </li>

                        <li class="atag nav-item">
                            <a class="link-primary nav-link text-white" href="../login/login_form.php">ログイン</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="main vh-100 d-flex align-items-center">
    </div>

    <!-- <div>
    <table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th scope="col">見出し</th>
      <th scope="col">見出し</th>
      <th scope="col">見出し</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>テーブルのセル</td>
      <td>テーブルのセル</td>
      <td>テーブルのセル</td>
    </tr>
    ...
  </tbody>
</table>
    </div> -->




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js
            " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM
            " crossorigin="anonymous ">
    </script>
</body>

</html>