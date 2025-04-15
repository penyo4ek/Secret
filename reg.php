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
<?php
    $date=date("Y-m-d");
?>
<div class="d-flex flex-column align-items-center justify-content-center my-3" style="min-height:75vh">
    <div class="w-100 text-center h2">Регистрация</div>
    <div class="d-flex flex-column align-items-center justify-content-center">
    <form class="needs-validation" action="serverREG.php" method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Фамилия</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="surname" pattern="^[А-Яа-я]{2,30}" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Имя</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" pattern="^[А-Яа-я]{2,30}" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Отчество</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="patronymic" aria-describedby="emailHelp" pattern="^[А-Яа-я]{2,30}" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Дата рождения</label>
            <input type="date" class="form-control" id="exampleInputEmail1" name="date" aria-describedby="emailHelp" max=<?php echo $date ?> required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Номер телефона</label>
            <input type="tel" class="form-control" id="exampleInputEmail1" name="phone" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
        </div>
        <div class="mb-3">У Вас уже есть аккаунт? - <a href='index.php'>Авторизуйтесь!</a></div>
        <button type="submit" class="btn btn-primary">Войти</button>
    </form>
    </div>
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
<script>
    (() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
</script>
</html>