# Реализация SweetAlert 2 для Laravel 5.5.x

[![Latest Version](https://img.shields.io/github/release/rulweb/laravel-swal.svg?style=flat)](https://github.com/rulweb/laravel-swal/releases)
[![License](https://img.shields.io/packagist/l/rulweb/laravel-swal.svg?style=flat)](https://packagist.org/packages/rulweb/laravel-swal)

## Установка

Установка пакета с помощью [Composer](https://getcomposer.org/), в корневом каталоге вашего приложения

```bash
$ composer require rulweb/laravel-swal
```

В Laravel 5.5.x пакеты подгружаются автоматически, по этому не нужно ничего прописывать в `config/app.php`

В шаблоне перед тегами `</body></html>` добавить:

```blade
@if (session()->has('swal'))
<script>swal({!! session()->get('swal') !!})</script>
@endif
```

## Использование

Использование [фасада](http://laravel.com/docs/facades)
```php
use RulWeb\Swal\Facades\Swal;
```

```php
// Использование методов
Swal::error($title, $message);

// Более гибкий вариант
Swal::type('error')->title('Ошибка')->html('Время действия прошлого <strong>ключа подтверждения</strong> ещё не истекло');
```

Использование хелперов
```php
// Использование методов
swal()->error($title, $message);
```
```php
// Более гибкий вариант
swal()->type('error')->title('Ошибка')->html('Время действия прошлого <strong>ключа подтверждения</strong> ещё не истекло');
```


## License

[MIT](LICENSE) © [RuleZzz](https://github.com/rulweb)