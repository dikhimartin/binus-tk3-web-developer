[![laravel](https://i.ibb.co/SmtP4vH/image-4.png)](https://laravel.com)

Demo : [https://laravel.com](https://laravel.com)

## Cara menjalankan aplikasi

**Tech Stack :**

  - Docker Engine https://docs.docker.com/engine/install
  - Docker Compose https://docs.docker.com/compose/install

**Proses Instalasi :**

- Install Docker Engine & Docker Compose.

- Cloning aplikasi source

  ```shell
  git clone https://gitlab.com/travel-apps/dashboard.git
  ```

- Masuk ke aplikasi source

  ```shell
  cd dashboard
  ```

- Copy file environtment

  ```shell
  cp ./project/.env.example ./project/.env
  ```

- Build Dockerfile

  ```shell
  docker build -t myapp .
  ```

- Jalankan aplikasi menggunakan command 

  ```shell
  docker-compose up -d
  ```

- Inisialisasi Database

  ```shell
  docker-compose exec myapp php artisan migrate  
  ```

  ```shell
  docker-compose exec myapp  php artisan db:seed
  ```

- Buka browser pada URL  http://localhost:8000, untuk mengakses aplikasi.

  - Akses Login 
    - Username    : superadmin
    - Password    : superadmin

- Buka browser pada URL  http://localhost:8080, untuk mengakses PHPmyadmin (Database Management).

  - Akses database 
    - server : mysql
    - username : root
    - password : root

- Stop service 

  ```shell
  docker-compose down
  ```

- Stop service with remove volume

  ```shell
  docker-compose down -v
  ```

- Restart service

  ```shell
  docker-compose up -d --force-recreate
  ```

- Akses bash terminal

  ```shell
  docker-compose exec myapp bash
  ```

------