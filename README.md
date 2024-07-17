## Развертывание

1. `cp .env.example .env`
2. `php artisan sail:install`
    - Mysql
3. `./vendor/bin/sail up -d`
4. `./vendor/bin/sail artisan migrate --seed`


## Блог
### Все записи блога
`GET: /api/blog`

### Создать запись блога
`POST: /api/blog`

request:
```ts
{
    title: string
    content: string
}
```

### Редактировать запись блога
`PATCH: /api/blog/{articleId}`

request:
```ts
{
    title: string?
    content: string
}
```

### Удалить запись блога
`DELETE: /api/blog/{articleId}`

## Mail

### Отправить письмо
`POST /api/sendMail`

request:
```ts
{
    name: string?
    email: string
    phone: string
}
```

## Telegram

### Отправить сообщение в чат
`POST /api/sendTelegram`

request:
```ts
{
    message: string
}
```
