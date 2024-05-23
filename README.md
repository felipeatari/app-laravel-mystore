# Comandos artisan

### Criar classes
./vendor/bin/sail artisan make:controller TestController
./vendor/bin/sail artisan make:model Test
./vendor/bin/sail artisan make:factory TestFactory
./vendor/bin/sail artisan make:seeder TestSeeder

## Banco de Dados - Cria tabela
./vendor/bin/sail artisan make:migration create_name_table
./vendor/bin/sail artisan migrate:fresh

## Banco de Dados - Adiciona dados
./vendor/bin/sail artisan migrate:fresh -seed

## Banco de Dados - Cria classes DB
./vendor/bin/sail artisan make:model Test --migration --factory --seed
