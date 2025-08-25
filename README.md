🛠 Требования
Для запуска проекта локально вам потребуется только Docker Desktop <br>(который включает Docker Engine и Docker Compose) и Git.

Docker Desktop<br>
Git

🚀 Быстрый старт: Локальная установка с Docker Compose
1. git clone <https://github.com/Gasius/f4-Task>
2. cd f4-task-project
3. docker-compose up -d --build
4. внутри app
   docker-compose exec app composer install
5. php artisan key:generate
6. php artisan migrate
7. docker-compose exec app php artisan serve --host=0.0.0.0

⚙️ Полезные команды

1. Остановка всех контейнеров: docker-compose down
2. Запуск всех контейнеров: docker-compose up -d
3. Установка зависимостей: docker-compose exec app composer install
4. Выполнение миграций: docker-compose exec app php artisan migrate
5. Откат миграций: docker-compose exec app php artisan migrate:rollback
6. Очистка кэша: docker-compose exec app php artisan optimize:clear
7. Запуск тестов: docker-compose exec app php artisan test
8. Вход в Bash-сессию контейнера: docker-compose exec app bash
