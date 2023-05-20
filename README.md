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



## Module Aplikasi 


Dari kriteria tersebut dapat di definisikan beberapa module yang ada dalam website, antara lain :

1. #### Login Dan Registrasi

   ![](https://i.ibb.co/kxb54X5/login-registrasi.png)

   

2. #### Profil

   ![https://i.ibb.co/wNPbDZ9/profile.png]([https://i.ibb.co/wNPbDZ9/profile.png](https://camo.githubusercontent.com/e56cd3caa80c4690cc3547feaaf0b58e424af7df6dc4ab0267717bcada0d1d7e/68747470733a2f2f692e6962622e636f2f774e5062445a392f70726f66696c652e706e67))

   

3. #### Dashboard (Mini Pos)

   ![https://i.ibb.co/YZ5K19N/mini-pos.png](https://i.ibb.co/YZ5K19N/mini-pos.png)

   

4. #### Master Data

   - ##### Jenis Barang

     ![](https://i.ibb.co/myMSp0n/product-type.png)

     

   - ##### Barang

     ![](https://i.ibb.co/kQcjk0b/product.png)

     

   - ##### Pembeli

     - Daftar Pembeli

       ![](https://i.ibb.co/Qfx9zPc/customer-list.png)

       

     - Tambah Pembeli

       - Tab Profil


         
         ![](https://i.ibb.co/B2Br9Bs/tab-profile.png)

         

       - Tab Alamat


         
         ![](https://i.ibb.co/zPR1YqG/tab-alamat.png)

         

       - Tab Akun


         
         ![](https://i.ibb.co/7XQySkP/tab-akun.png)

       

     - Ubah Pembeli


       
       ![](https://i.ibb.co/KjLQrVQ/update-customer.png)

     

   - ##### Staff

     - Daftar Staff

       ![](https://i.ibb.co/9hbswX6/daftra-staff.png)

       

     - Tambah Staff

       - Tab Profil


         
         ![](https://i.ibb.co/fpbYpmz/profil-tab.png)

         

       - Tab Akun


         
         ![](https://i.ibb.co/ySdRFqT/akun-tab.png)

       

     - Ubah Staff


       
       ![](https://i.ibb.co/gSCScsn/ubah-data.png)

       

5. #### Penjualan

   - Daftar Penjualan

     ![](https://i.ibb.co/fY97HBv/daftar-penjualan.png)

     

   - Detail Penjualan


     
     ![](https://i.ibb.co/mtwQsrv/detail-penjualan.png)

   

6. #### Akses Pengguna

   - ##### Daftar Pengguna

     ![](https://i.ibb.co/Mp82vXb/daftar-pengguna.png)

     

   - ##### Hak Akses Pengguna

     ![](https://i.ibb.co/n1nBDTg/hak-akses-pengguna.png)



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

- Dari kriteria tersebut dapat di definisikan beberapa module yang ada dalam website, antara lain :Akses bash terminal

  ```shell
  docker-compose exec myapp bash
  ```

