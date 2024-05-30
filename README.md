## Leia

O projeto **tailwind-volt-template** está sendo desenvolvido com [Laravel v11+](https://laravel.com/docs/11.x), [Livewire v3](https://livewire.laravel.com/), [Volt](https://livewire.laravel.com/docs/volt) e [TailwindCSS](https://tailwindcss.com/).

```sh
git clone https://github.com/vverardO/tailwind-volt-template.git
cd tailwind-volt-template
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Assim já terá no banco um total de um usuário do tipo gestor, dez usuários do tipo basico.

PS.: A senha dos usuários é "password".