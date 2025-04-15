<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Заплыв</title>
</head>
<body class="mx-5">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Заплыв</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Оставить заявку</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Профиль</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<div class="d-flex flex-column align-items-center justify-content-center" style="min-height:75vh">
    <div class="w-100 text-center h2">Профиль</div>
    <div class="d-flex flex-column align-items-center justify-content-center">
        Ваши данные: <br>
        <?php
            echo "Фамилия: ". $_SESSION['surname']."<br>";
            echo "Имя: ". $_SESSION['name']."<br>";
            echo "Отчество: ". $_SESSION['patronymic']."<br>";
            echo "Email: ". $_SESSION['email']."<br>";
            include("conn.php");
            $id=intval($_SESSION['id']);
            $sql="SELECT * FROM `users` WHERE `id` = $id";
            $result=$mysqli->query($sql);
            $row=$result->fetch_assoc();
            if ($row['role']=='admin'){
                echo <<< HERE
                    <button class="btn btn-primary" onclick="document.location='all_applications.php'">Все заявки</button>
                HERE;
            }
        ?>
        <button class="btn btn-outline-primary mt-3" onclick="document.location='logout.php'">Выйти из аккаунта</button>
        <button class="btn btn-primary mt-3" onclick="document.location='applications.php'">Мои заявки</button>
    </div>
    <button class="btn btn-primary mt-3" onclick="document.location='application.php'">Оставить заявку</button>
</div>

    <footer>
    <div class="d-flex">
        <div class="w-50 text-start h1">
            Бассейн "Заплыв"
        </div>
        <div class="w-50 text-end">
            <div class="">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Оставить заявку</a>
                </li>
                <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Профиль</a>
                </li>
            </ul>
            </div>
        </div>
        
    </div>
    <div class="display-6 text-center">8(800) 888-52-25</div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</html>
