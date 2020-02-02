
## About LaravelAPI APP

On this project we will attempt to create an api via eloquient 

- [See More for Routing (https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).
- [See More for Vue Js and VueX for state management]
- [Bootstrap 4]

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Documentation
 - Database migration 
    [ Create database - laravelAPI, then edit .env file- add database name, user and password]
    [ Migration commad - php artisan make:migration create_articles_table --create=articles -> Created Migration: 2020_02_02_054201_create_articles_table]
 - Generate Article Seeder 
    [ Seeder Command- php artisan make:seeder ArticlesTableSeeder -> Seeder created successfully.]
- Generate Article Factory 
    [ Factory Command- php artisan make:factory ArticleFactory] -> Factory created successfully.
- Create Article Model 
    [ Model Command- php artisan make:model Article] -> Model created successfully.

All this are necessary for running database migration. Similar logic should be applied for all tables in the future.
- Migrate
    php artisan migrate
    Migration table created successfully.
    Migrating: 2014_10_12_000000_create_users_table
    Migrated:  2014_10_12_000000_create_users_table (0.54 seconds)
    Migrating: 2014_10_12_100000_create_password_resets_table
    Migrated:  2014_10_12_100000_create_password_resets_table (0.34 seconds)
    Migrating: 2020_02_02_054201_create_articles_table
    Migrated:  2020_02_02_054201_create_articles_table (0.08 seconds)
- Seed DB
    [ php artisan db:seed] -> Seeding: ArticlesTableSeeder, Database seeding completed successfully.

- Create Controller
    [ php artisan make:controller ArticleController --resource] -> Controller created successfully.
    --resource creates all the methods such as create(), store(), edit() and so on.

## LaravelAPI Relatied issues and atricles

- **InvalidArgumentException  : Unable to locate factory with name [default] [App\Article].
- This solved by replacing 
    $factory->define(Model::class, function (Faker $faker) {
        return [
            //data
            'title' => $faker->text(50),
            'body' => $faker->text(200)
        ];
    });

Model with App\Article

I try to list all issues out here while on development phase. 

Create Resource 

    [Create Resource php artisan make:resource Article] -> Resource created successfully.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
