<!DOCTYPE html>
<html>
<head>
    <!--Materialize-->

    <!--Import Google Icon Font--> 
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!--Проверка csrf-токена как post параметра для ajax-->
    <meta name="csrf-token" content="{{ csrf_token() }}">    
</head>
<body>
    <div>
        <a id="account" class="btn-large"><i class="material-icons">account_box</i></a>
        <span>Администратор</span>
    
    </div>

    <div>
        <br>
        <br>
        <span>Редактирование пользователя</span>
    </div>

    <div class="card-panel hoverable row">
        <div class="input-field col s4">
            <select id="select-user1">
            </select>
            <label for="select-user1">Пользователь</label>
        </div>

        <div class="input-field col s4">
            <input id="login" type="text">
            <label for="login">Логин</label>
        </div>

        <div class="input-field col s4">
            <input id="password" type="text">
            <label for="password">Пароль</label>
        </div>

        <br>

        <div class="input-field col s4">
            <select id="select-role">
            </select>
            <label for="select-role">Роль</label>
        </div>

        <div id="div-group" class="input-field col s4 hide">
            <select id="select-group1">
            </select>
            <label for="select-group1">Группа</label>
        </div>

        <div id="div-department" class="input-field col s4 hide">
            <select id="select-department1">
            </select>
            <label for="select-department1">Кафедра</label>
        </div>        

        <div class="col s2">
            <button id="addUser" class="btn-floating btn-small waves-effect waves-light light-green accent-4">
                <i class="material-icons">check</i>
            </button>
        </div>

        <div class="col s2">
            <button id="deleteUser" class="btn-floating btn-small waves-effect waves-light red accent-4">
                <i class="material-icons">cancel</i>
            </button>
        </div>
    </div>

<!-- ____________________________________________________________________________________________ -->

    <div>
        <br>
        <br>
        <span>Блоки, расположенные ниже, находятся в стадии разработки</span>
        <br>
        <br>
        <span>Редактирование группы</span>
    </div>
    <div class="card-panel hoverable row">
        <div class="input-field col s3">
            <select id="select-group2">
            </select>
            <label for="select-group2">Группа</label>
        </div>

        <div class="input-field col s3">
            <input id="group" type="text">
            <label for="group">Название группы</label>
        </div>

        <div class="input-field col s3">
            <select id="select-department2">
            </select>
            <label for="select-department2">Кафедра</label>
        </div>       

        <div class="col s2">
        </div>

        <div class="col s1">
            <button id="addGroup" class="btn-floating btn-small waves-effect waves-light light-green accent-4">
                <i class="material-icons">check</i>
            </button>
        </div>
    </div>

    <div>
        <br>
        <br>
        <span>Редактирование предмета</span>
    </div>
    <div class="card-panel hoverable row">
        <div class="input-field col s3">
            <select id="select-subject">
            </select>
            <label for="select-subject">Предмет</label>
        </div>

        <div class="input-field col s3">
            <input id="subject" type="text">
            <label for="subject">Название предмета</label>
        </div>

        <div class="input-field col s3">
            <select id="select-user2">
            </select>
            <label for="select-user2">Преподаватель</label>
        </div>       

        <div class="col s2">
        </div>

        <div class="col s1">
            <button id="addSubject" class="btn-floating btn-small waves-effect waves-light light-green accent-4">
                <i class="material-icons">check</i>
            </button>
        </div>
    </div>
    
    <!-- Скрипты (jQuery перед Materialize!) -->
    <!-- TODO В продакшене поменять на min.js -->
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="js/materialize.js"></script>

    <script src="js/admin.js"></script>
</body>
</html>