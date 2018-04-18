//Глобальные переменные
//Массив пользователей после загрузки
var usersArray = [];

//Прелоадер
var preloader = 
'<div class="preloader-wrapper active">' + 
    '<div class="spinner-layer spinner-blue-only">' +
        '<div class="circle-clipper left">' +
            '<div class="circle"></div>' +
        '</div><div class="gap-patch">' +
            '<div class="circle"></div>' +
        '</div><div class="circle-clipper right">' +
            '<div class="circle"></div>' +
        '</div>' +
    '</div>' +
'</div>';

var toast = $('<span>Загрузка... </span>').add(preloader);

//////////////////////////////////////////////////////////////////////////////////////
//Блок обновления                                                                   //
//////////////////////////////////////////////////////////////////////////////////////


function refrashAll() {

    //Включаем всплывающее окно (для интерактивности) 
    Materialize.toast(toast, 1000, 'rounded');

    //Обновление пользователей
    $.ajax({
        url:'admin/refrashUser',
        type:'GET',
        success: function(received){

            //console.log(received);

            usersArray = [];
            usersArray = received;

            //Удаление дочерних (jQuery)
            $('#select-user1').empty();

            var out = '<option value=0>Создать нового</option>';

            received.forEach(function(item, i, arr) {
               out += '<option value=' + item.u_id + '>' + item.u_name + ' - ' +
                    item.role + '</option>';
            });

            $('#select-user1').append(out);
            
            //Обновление material_select
            $('select').material_select();
        },
        error: function(xhr,textStatus){
            Materialize.toast('Обновление пользователей - ' + textStatus, 2000, 'rounded');
        }
    });

    //Обновление ролей
    $.ajax({
        url:'admin/refrashRole',
        type:'GET',
        success: function(received){

            var out = '';

            //Удаление дочерних (jQuery)
            $('#select-role').empty();

            received.forEach(function(item, i, arr) {
               out += '<option value=' + item.id + '>' + item.name + '</option>';
            });

            $('#select-role').append(out);
            
            //Обновление material_select
            $('select').material_select();
        },
        error: function(xhr,textStatus){
            Materialize.toast('Обновление ролей - ' + textStatus, 2000, 'rounded');
        }
    });

    //Обновление кафедр
    $.ajax({
        url:'admin/refrashDepartment',
        type:'GET',
        success: function(received){

            var out = '';

            //Удаление дочерних (jQuery)
            $('#select-department1').empty();

            received.forEach(function(item, i, arr) {
               out += '<option value=' + item.id + '>' + item.name + '</option>';
            });

            $('#select-department1').append(out);
            
            //Обновление material_select
            $('select').material_select();
        },
        error: function(xhr,textStatus){
            Materialize.toast('Обновление кафедр - ' + textStatus, 2000, 'rounded');
        }
    });

    //Обновление групп
    $.ajax({
        url:'admin/refrashGroup',
        type:'GET',
        success: function(received){

            var out = '';

            //Удаление дочерних (jQuery)
            $('#select-group1').empty();

            received.forEach(function(item, i, arr) {
               out += '<option value=' + item.id + '>' + item.name + '</option>';
            });

            $('#select-group1').append(out);
            
            //Обновление material_select
            $('select').material_select();
        },
        error: function(xhr,textStatus){
            Materialize.toast('Обновление групп - ' + textStatus, 2000, 'rounded');
        }
    });
}


//////////////////////////////////////////////////////////////////////////////////////
//Конец блока обновления                                                            //
//////////////////////////////////////////////////////////////////////////////////////


//Загрузка документа
$( document ).ready(function() {

    //СМЕНА СТРАНИЦЫ
    $('#account').click(function(){
        location.replace("teacher");
    });

    //Обновляем все
    refrashAll();

    $('#select-user1').change(function() {

        $('#div-group').addClass("hide");
        $('#div-department').addClass("hide");

        $('#login').val('');
        $('#password').val('');

        //Во всех случаях кроме 0 обновляем параметры
        if ($('#select-user1').val() != 0) {
            var index;

            //Индексы внутри селектора могут не совпадать
            for (var i = 0; i < usersArray.length; i++) {
                if (usersArray[i].u_id == ($('#select-user1').val())) {
                    index = i;
                } 
            }
            
            $('#login').val(usersArray[index].u_name);
            $('#password').val(usersArray[index].password);
            $('#select-role').val(usersArray[index].r_id);

            if (usersArray[index].role == "Преподаватель") {
                $('#select-department1').val(usersArray[index].d_id);
                $('#div-department').removeClass("hide");
            } 

            if ((usersArray[index].role == "Студент") || (usersArray[index].role == "Староста")) {
                $('#select-group1').val(usersArray[index].s_group_id);
                $('#div-group').removeClass("hide");
            }

            //Обновление material_select
            $('select').material_select();
        }
    });

    $('#select-role').change(function() {
        $('#div-department').addClass("hide");
        $('#div-group').addClass("hide");

        //Преподаватель
        if ($('#select-role').val() == 3) {
            $('#div-group').addClass("hide");
            $('#div-department').removeClass("hide");
        }

        //Староста, студент
        if (($('#select-role').val() == 2) || ($('#select-role').val() == 5)) {
            $('#div-department').addClass("hide");
            $('#div-group').removeClass("hide");
        }
    });

    $('#addUser').click(function(){
        var setId = $('#select-user1').val();
        var setName = $('#login').val();
        var setPassword = $('#password').val();
        var setRoleId = $('#select-role').val();
        var setStudyGroupId = null;
        var setDepartmentId = null;

        if (setName.length == 0 || setPassword.length == 0) {
            Materialize.toast('Заполните поле логина / пароля!', 2000, 'rounded');
            return;
        }

        //Преподаватель
        if (setRoleId == 3) {
            setDepartmentId = $('#select-department1').val();
        }

        //Староста, студент
        if ((setRoleId == 2) || (setRoleId == 5)) {
            setStudyGroupId = $('#select-group1').val();
        }

        $('#select-user1').val(0);
        $('#login').val('');
        $('#password').val('');
        $('#select-role').val('');
        $('#select-group1').val(1);
        $('#select-department1').val(1);
        $('#div-department').addClass("hide");
        $('#div-group').addClass("hide");

        //Сохранение пользователя
        $.ajax({
            url:'admin/saveUser',
            type:'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                u_id: setId,
                u_name: setName,
                password: setPassword,
                r_id: setRoleId,
                g_id: setStudyGroupId,
                d_id: setDepartmentId
            },
            success: function(){
                
                Materialize.toast('Сохранено!', 2000, 'rounded');

                refrashAll();
            },
            error: function(xhr,textStatus){
                Materialize.toast('Сохранение пользователя - ' + textStatus, 2000, 'rounded');
            }
        });
    });

    $('#deleteUser').click(function(){
        var setId = $('#select-user1').val();
        
        $('#select-user1').val(0);
        $('#login').val('');
        $('#password').val('');
        $('#select-role').val('');
        $('#select-group1').val(1);
        $('#select-department1').val(1);
        $('#div-department').addClass("hide");
        $('#div-group').addClass("hide");

        //Удаление пользователя
        $.ajax({
            url:'admin/deleteUser/' + setId,
            type:'GET',
            success: function(){
                Materialize.toast('Удалено!', 2000, 'rounded');
                refrashAll();
            },
            error: function(xhr,textStatus){
                Materialize.toast('Удаление пользователя - ' + textStatus, 2000, 'rounded');
            }
        });
    });
})