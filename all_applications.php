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
    <div class="w-100 text-center h2">Все заявки:</div>
    <div class="d-flex flex-column  w-100">
        <div>
            <?php
                include('conn.php');
                $sql="SELECT `users`.`surname`, `users`.`name`, `users`.`patronymic`, 
                `statuses`.`name` AS `sname`, 
                `applications`.`date`, `applications`.`gender`, `applications`.`med_img`, `applications`.`id` FROM `applications`
                INNER JOIN `users` ON `users`.`id` = `applications`.`user_id`
                INNER JOIN `statuses` ON `statuses`.`id` = `applications`.`status_id`";
                $result=$mysqli->query($sql);
                Echo <<< HERE
                    <table style="border:1px solid black" class="w-100">

                    <tr>
                        <th>Фамилия</th>
                        <th>Имя</th>
                        <th>Отчество</th>
                        <th>Пол</th>
                        <th>Дата посещения</th>
                        <th>Мед справка</th>
                        <th>Статус</th>
                        <th>Изменить на</th>
                    </tr>

                HERE;
                while($row=$result->fetch_assoc()){
                    Echo <<< HERE
                    <tr>
                        <td>{$row['surname']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['patronymic']}</td>
                        <td>{$row['gender']}</td>
                        <td>{$row['date']}</td>
                        <td><img src='assets/{$row['med_img']}' height="150px"></td>
                HERE;
                    if ($row['sname'] == "В работе"){
                        ECHO <<< HERE
                            <td class="bg-warning">
                                {$row['sname']}
                            </td>
                        
                        HERE;
                    }
                    else if ($row['sname'] == "Одобрено"){
                        ECHO <<< HERE
                            <td class="bg-success">
                                {$row['sname']}
                            </td>
                        
                        HERE;
                    }
                    else if ($row['sname'] == "Отклонено"){
                        ECHO <<< HERE
                            <td class="bg-danger">
                                {$row['sname']}
                            </td>
                        
                        HERE;
                    }
                    else{
                        ECHO <<< HERE
                            <td>
                                {$row['sname']}
                            </td>
                        HERE;
                    }
                    echo <<< HERE
                        <td >
                            <form action="serverUP.php?id={$row['id']}" method="post">
                            <select name="status_id" id="">
                                <option selected disabled>Выберите статус</option>
                                <option value="1">Новое</option>
                                <option value="2">В работе</option>
                                <option value="3">Одобрено</option>
                                <option value="4">Отказано</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Изменить</button>
                            </form>
                        </td>
                        </tr>
                    HERE;
            }
                Echo <<< HERE
                    </table>
                HERE;
            ?>
        </div>
        
    </div>
    <button class="btn btn-primary mt-3" onclick="document.location='profile.php'">В профиль</button>
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