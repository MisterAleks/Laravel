# PPO
PPO on PHP Laravel Framework

Подробная документация на русском здесь: http://laravel.su/

Структура проекта Laravel следующая:
  - Контроллеры: app/Http/Controllers
      -Команда в консоли для создания: 1). Перейти в папку проекта: cd domains/PPO; 
                                       2). Создать контроллер: php artisan make:controller ControllerName
  - Модели: app/
      -Команда в консоли: Перейти в папку проекта (!), создать модель: php artisan make:model ModelName
  
  - Вьюшки: resources/views/
      -Создаем руками файл формата: viewName.blade.php
      -Обращениме к view из метода контроллера: public function index() {
                                                    return view('viewName');
                                                }
      -Все, что было во view, вернется на странице.
      
Краткая настройка:
  - Файлы css и js лежат в общей папке public, кидать туда (ДАЖЕ ЕСЛИ view думает, что они лежат с ней на одном уровне, из папки resources/view он их НЕ увидит, ложить в public)
  - Для определения соответствия определенного пути в URL и метода контроллера, необходимо прописать путь (route) в файле routes/web.php по формату, который там будет для примера.
      -Для вызова метода контроллера будет так: Route::get('/refrashUser', 'AdminController@refrashUser');
  - Настройки подключения к БД прописывать в файле .env, поскольку это настройки на продакшн сервере, соответственно, локальные настройки из файла config/database.php буду проигнорированы.
