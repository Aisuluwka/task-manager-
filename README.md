# Task Manager — Laravel 11 & 12 + FrankenPHP + Docker Boilerplate

[![Laravel](https://img.shields.io/badge/Laravel-11%20%7C%2012-red?style=flat&logo=laravel&logoColor=white)](https://laravel.com/docs/)
[![PHP](https://img.shields.io/badge/PHP-8.3-blue?style=flat&logo=php&logoColor=white)](https://www.php.net/)
[![Docker](https://img.shields.io/badge/Docker-Container-blue?style=flat&logo=docker)](https://www.docker.com/)
[![Vue.js](https://img.shields.io/badge/Vue.js-3-brightgreen?style=flat&logo=vue.js)](https://vuejs.org/)
[![MySQL](https://img.shields.io/badge/MySQL-Database-blue?style=flat&logo=mysql)](https://www.mysql.com/)

---

## 📖 Описание проекта

Этот проект — простое веб-приложение для управления задачами, реализованное с использованием Laravel 11/12 (backend), Vue.js (frontend), MySQL (база данных) и Docker для контейнеризации.

В проекте применяются современные инструменты и технологии:
- Laravel Octane + FrankenPHP для быстрого и эффективного backend;
- MySQL для хранения данных;
- Vue.js для динамичного SPA интерфейса;
- Docker для удобства разработки и деплоя.

---

## 🚀 Возможности приложения

- Создание задач с названием, описанием и сроком выполнения;
- Просмотр списка задач;
- Редактирование и удаление задач;
- Адаптивный и удобный интерфейс с использованием Bootstrap 5 или Tailwind CSS;
- Полная контейнеризация для быстрого запуска и разработки.

---

## 📦 Технологии и сервисы

| Сервис         | Описание                       |
|----------------|-------------------------------|
| Laravel 11/12  | Backend REST API              |
| FrankenPHP     | Высокопроизводительный PHP-сервер |
| Laravel Octane | Оптимизация производительности|
| MySQL          | СУБД                          |
| Redis          | Кеширование                   |
| Vue.js 3       | Frontend SPA                  |
| Docker         | Контейнеризация приложения    |
| Minio          | S3 совместимое хранилище      |
| MailPit        | Локальный SMTP-сервер для тестов |

---

## 📋 Содержание README

- [Установка](#установка)
- [Настройка окружения](#настройка-окружения)
- [Запуск приложения](#запуск-приложения)
- [Использование API](#использование-api)
- [Структура проекта](#структура-проекта)
- [Контрибьюция](#контрибьюция)
- [Лицензия](#лицензия)

---

## 🛠️ Установка

Клонируйте репозиторий:

```bash
git clone https://github.com/jaygaha/laravel-11-frankenphp-docker.git
cd laravel-11-frankenphp-docker


git clone https://github.com/Aisuluwka/task-manager-.git
cd task-manager
docker-compose up --build
