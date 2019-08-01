# SymfonyCommandApp

To execute the project:
1. Redefine db_user and db_password in file .env for the DATABASE_URL parameter.
2. Execute in console: php bin/console doctrine:database:create
3. Execute in console: php bin/console make:migration
4. Execute in console: php bin/console doctrine:migrations:migrate
5. Enter any of the available commands.

Available commands:
1. bin/console book:add
2. bin/console book:delete
3. bin/console book:list
4. bin/console author:add
5. bin/console author:delete
6. bin/console author:list
7. bin/console book:attach --author ID
8. bin/console book:detach --author ID
