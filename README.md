[![laravel](https://i.ibb.co/SmtP4vH/image-4.png)](https://laravel.com)

Demo : [https://tk3.binusassignment.tech](https://tk3.binusassignment.tech)



## Penjelasan

Kami membuat project ini, karena untuk melengkapi satu tugas kelompok ke -3 dalam mata kuliah Web Developer. Jadi kita diminta untuk membuat suatu website dengan kriteria sebagai berikut :

```
Buatlah aplikasi pendataan produk menggunakan Laravel untuk membuat proses create, read, update, dan delete (CRUD) sederhana. CRUD merupakan proses standar yang biasa ditemukan pada sebuah sistem aplikasi web. Berikut adalah konsep CRUD yang akan dibuat:

Data Barang: 
• Nama barang
• Deskripsi
• Jenis barang
• Stock barang
• Harga Beli
• Harga Jual 
• Gambar barang

Data pembeli
• Nama 
• TTL
• Jenis kelamin
• Alamat
• Foto KTP
• User
• Password
• Retype Password

Data Staff:
• Nama 
• Jenis kelamin
• user
• Password
• Retype Password

Aturannya adalah:
1) Sebelum menggunakan aplikasi setiap user harus login terlebih dahulu
2) Staff dapat memasukan data pembeli pada aplikasi sehingga pembeli dapat masuk kedalam aplikasi
3) Staff dapat memasukkan, mengedit dan menghapus data barang
4) Admin dapat memasukkan, mengedit, menghapus data obat dan user
5) Ketika pembeli selesai membeli barang maka staff memvalidasinya dan jika staff klik “submit” pada data penjualan maka stok barang akan berkurang.

Tech Stack Requirement : 
- Laravel Framework >= 5.8 
```



## Cara menjalankan aplikasi

#### 1. Native Server

Berikut ini rekaman untuk cara menjalankan aplikasinya :

https://asciinema.org/a/582677

Buka browser pada URL  http://localhost:8000, untuk mengakses aplikasi.

- Akses Login :

  | No   | Role        | Username   | Kata sandi |
  | ---- | ----------- | ---------- | ---------- |
  | 1    | Super Admin | superadmin | superadmin |
  | 2    | Admin       | admin      | admin      |
  | 3    | Staff       | staff      | staff      |
  | 4    | Customer    | customer   | customer   |

#### 2. Docker Server

**Tech Stack :**

  - Docker Engine https://docs.docker.com/engine/install
  - Docker Compose https://docs.docker.com/compose/install

**Proses Instalasi :**

- Install Docker Engine & Docker Compose.

- Cloning aplikasi source

  ```shell
  git clone https://github.com/dikhimartin/binus-tk3-web-developer.git
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