# Send Grid

Uses:

``curl/7.51.0`` 
``PHP/5.6.29``
 
Use real:

```php
$key = 'SG.ewqq22***';
$to = 'test@test.ru';
$to_name = 'Nastia';
$from = 'support@test.com';
$from_name = 'support';
$title = 'Заголовок';
$body = 'Текст сообщения';

new SendGrid\Client($key, false, $to, $to_name, $from, $from_name, $title, $body);
```
 
Use test:

```php
$key = 'SG.ewqq22***';

new SendGrid\Client($key, true);
```