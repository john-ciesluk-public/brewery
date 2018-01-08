# Brewing Company Sample Website

This is a brewing company website written in Laravel.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Server Requirements

PHP >= 7.0.0,
OpenSSL PHP Extension,
PDO PHP Extension,
Mbstring PHP Extension,
Tokenizer PHP Extension,
XML PHP Extension

### Installing

Composer must be installed to use Laravel.

Copy .env.example to .env and input the proper database credentials to get started.

Seed sample database data by first running migrations and then seeding the data.

```
php artisan migrate:fresh

php artisan db:seed
```

Install node and webpack

```
npm install

npm run dev
```

Set up a default administrator, or use a seeded sample user

```
http://example.com/register

http://example.com/login
Sample data users have the password set as 'password'
```

Once logged in, you can alter configuration data to disable registration

```
http://example.com/admin/config
```

## Built With

* [Laravel 5.5](https://www.laravel.com) - The PHP web framework used
* [VueJS 2.5.13](https:/vuejs.org/) - VueJS
* [Bootstrap 3.3.7](https://getbootstrap.com/docs/3.3/) - Bootstrap CSS

## Authors

* **John Ciesluk** - *Initial work* - [john-ciesluk-public](https://github.com/john-ciesluk-public)

See also the list of [contributors](https://github.com/john-ciesluk-public/brewery/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
