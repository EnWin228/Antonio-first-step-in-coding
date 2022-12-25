# HTTP аутентификация
### Цель работы
Спроектировать и разработать систему авторизации пользователей на протоколе HTTP
## Ход работы
## 1. Пользовательский интерфейс
Все формы были сделаны без стилей css.
## 2. [Пользовательские сценарии работы](https://imgur.com/a/tltvChs)
## 3. [API сервера и хореография](https://imgur.com/a/KxFuDwA)
## 4. Структура базы данных
| id | login | hash | secword |
|:---|:------|:-----|:--------|
- id: INT, AUTO_INCREMENT, PRIMARY KEY;
Уникальный идентификатор пользователя
- login: VARCHAR, 20;
логин пользователя
- hash: VARCHAR, 64;
хэшированный пароль
- secret: VARCHAR, 64;
секретное слово для восстановления пароля
## 5. Алгоритмы
1. [Регистрация](https://imgur.com/a/v0FjTse)
2. [Авторизация](https://imgur.com/a/1pyMENC)
3. [Выход](https://imgur.com/a/J0175Fl)
4. [Обновление пароля](https://imgur.com/a/Gvue2Dl)
5. [Восстановление пароля](https://imgur.com/a/AnaJyg9)
## 6. Примеры HTTP запросов/ответов
### Регистрация
<br> GET /reg.php HTTP/1.1
<br> Host: localhost
<br> Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9
<br> Content-Type: application/x-www-form-urlencoded
<br> sec-ch-ua: "Chromium";v="106", "Google Chrome";v="106", "Not;A=Brand";v="99"
<br> sec-ch-ua-mobile: ?0
<br> sec-ch-ua-platform: "Windows"
<br> Upgrade-Insecure-Requests: 1
<br> User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36

<br> HTTP/1.1 200 OK
<br> Cache-Control: no-store, no-cache, must-revalidate
<br> Connection: Keep-Alive
<br> Content-Length: 906
<br> Content-Type: text/html; charset=UTF-8
<br> Date: Thu, 27 Oct 2022 07:46:03 GMT
<br> Expires: Thu, 19 Nov 1981 08:52:00 GMT
<br> Keep-Alive: timeout=5, max=99
<br> Pragma: no-cache
<br> Server: Apache/2.4.54 (Win64) PHP/8.1.10
<br> X-Powered-By: PHP/8.1.10

### Сохранение пользователя

<br> POST /save_user.php HTTP/1.1
<br> Host: localhost
<br> Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9
<br> Content-Type: application/x-www-form-urlencoded
<br> sec-ch-ua: "Chromium";v="106", "Google Chrome";v="106", "Not;A=Brand";v="99"
<br> sec-ch-ua-mobile: ?0
<br> sec-ch-ua-platform: "Windows"
<br> Upgrade-Insecure-Requests: 1
<br> User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36

<br> HTTP/1.1 302 Found
<br> Cache-Control: no-store, no-cache, must-revalidate
<br> Connection: Keep-Alive
<br> Content-Length: 167
<br> Content-Type: text/html; charset=UTF-8
<br> Date: Thu, 27 Oct 2022 07:46:03 GMT
<br> Expires: Thu, 19 Nov 1981 08:52:00 GMT
<br> Keep-Alive: timeout=5, max=100
<br> Location: reg.php
<br> Pragma: no-cache
<br> Server: Apache/2.4.54 (Win64) PHP/8.1.10
<br> X-Powered-By: PHP/8.1.10

### Страница профиля

<br> GET /main.php HTTP/1.1
<br> Host: localhost
<br> Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9
<br> Content-Type: application/x-www-form-urlencoded
<br> sec-ch-ua: "Chromium";v="106", "Google Chrome";v="106", "Not;A=Brand";v="99"
<br> sec-ch-ua-mobile: ?0
<br> sec-ch-ua-platform: "Windows"
<br> Upgrade-Insecure-Requests: 1
<br> User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36

<br> HTTP/1.1 200 OK
<br> Cache-Control: no-store, no-cache, must-revalidate
<br> Connection: Keep-Alive
<br> Content-Length: 555
<br> Content-Type: text/html; charset=UTF-8
<br> Date: Thu, 27 Oct 2022 07:48:51 GMT
<br> Expires: Thu, 19 Nov 1981 08:52:00 GMT
<br> Keep-Alive: timeout=5, max=99
<br> Pragma: no-cache
<br> Server: Apache/2.4.54 (Win64) PHP/8.1.10
<br> X-Powered-By: PHP/8.1.10

### Смена пароля

<br> GET /change.php HTTP/1.1
<br> Host: localhost
<br> Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9
<br> sec-ch-ua: "Chromium";v="106", "Google Chrome";v="106", "Not;A=Brand";v="99"
<br> sec-ch-ua-mobile: ?0
<br> sec-ch-ua-platform: "Windows"
<br> Upgrade-Insecure-Requests: 1
<br> User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36

<br> HTTP/1.1 200 OK
<br> Cache-Control: no-store, no-cache, must-revalidate
<br> Connection: Keep-Alive
<br> Content-Length: 911
<br> Content-Type: text/html; charset=UTF-8
<br> Date: Thu, 27 Oct 2022 07:49:44 GMT
<br> Expires: Thu, 19 Nov 1981 08:52:00 GMT
<br> Keep-Alive: timeout=5, max=100
<br> Pragma: no-cache
<br> Server: Apache/2.4.54 (Win64) PHP/8.1.10
<br> X-Powered-By: PHP/8.1.10

## 7. Важные части кода
1.Подключение БД и защита от перехода на файлы проекта
```php
<?php
  if (isset($_SERVER['HTTP_REFERER']) != "http://site/testreg.php" || isset($_SERVER['HTTP_REFERER']) != "http://site/save_user.php"
    || isset($_SERVER['HTTP_REFERER']) != "http://site/change_pass.php" || isset($_SERVER['HTTP_REFERER']) != "http://site/recovery.php") {
   http_response_code(403);
      exit();
}
    $db = mysqli_connect ("localhost","root","mypass","testing");
    ?>
```
