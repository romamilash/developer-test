# Инструкция по запуску проекта

## Шаг 1

### При создании проекта использовались следующие программы и технологии: 

Локальный веб-сервер Openserver, в программном коде использовался язык PHP версии 7.4, база данных MySQL 5.7, дополнительно подключены библиотеки Bootstrap 4, jQuery и Idiorm.

## Шаг 2

### Установить Openserver, либо настроить сервер самостоятельно;

## Шаг 3

### Распаковать архив в папку с доменами под названием catalog;

## Шаг 4

### Убедится, что сервер работает, открыть в браузере [phpMyAdmin](http://localhost/openserver/phpmyadmin/index.php);

## Шаг 5

### Зайти в панель управления

+ Пользователь: root
+ Пароль: root

## Шаг 6

### Выполнить sql-запрос для создания таблицы и базы данных:

```sql
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS catalog;

USE catalog;

CREATE TABLE `goods` (
                         `id` int(11) NOT NULL,
                         `name` varchar(255) NOT NULL,
                         `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица с товарами';


ALTER TABLE `goods`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `goods`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

```

## Шаг 7

### Перейти на страницу [всех товаров](http://catalog/index.php) с этой страницы есть возможность перехода на страницу [добавления товара](http://catalog/add.php);

## Шаг 8

### После добавления товара, производится переход обратно на страницу со всеми товарами.

### По вопросам выполнения можно писать мне на почту [roma@milash.info](roma@milash.info)