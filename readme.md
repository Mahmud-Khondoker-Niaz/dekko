
# Dekko Project

This is a Laravel-based project. Below are the instructions to run it locally using Docker.

## Requirements

- Docker and Docker Compose installed on your machine
- Git installed
- Basic knowledge of running commands in terminal or VS Code terminal

## Setup and Run

1. Clone the repository:

```bash
git clone https://github.com/Mahmud-Khondoker-Niaz/dekko.git
cd dekko
````

2. Build and start the Docker containers:

```bash
docker-compose up -d --build
```

3. Enter the `app` container and start Laravel development server:

```bash
docker-compose exec app php artisan serve --host=0.0.0.0
```

4. Access the project in your browser:

```
http://localhost:8000
```

## Database

* The project uses MySQL running inside Docker (`mysql:5.7` image).
* Database connection is configured in `.env` as follows:

```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=dekko
DB_USERNAME=root
DB_PASSWORD=root
```

* The database is already initialized using SQL scripts inside `docker/mysql-init/`.
* No need to run migrations manually.

## Mail Configuration

* The mail setup uses SMTP (Gmail or Mailtrap).
* You can configure mail credentials in the `.env` file as needed.

## Notes

* Make sure ports `8000` (app) and `3306` (MySQL) are free.
* If you face permission issues, try running commands as administrator or with sudo.
* To stop the containers, run:

```bash
docker-compose down
```

---

For any issues, please open an issue on GitHub or contact the maintainer.

---

Thank you for using the Dekko project!

```

Copy and paste this as your `README.md` content — all set!  

If you want, I can also generate it as a file for you. Just say the word.
```
