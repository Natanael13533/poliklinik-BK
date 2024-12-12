<!-- Improved compatibility of back to top link: See: https://github.com/othneildrew/Best-README-Template/pull/73 -->
<a id="readme-top"></a>
<!--
*** Thanks for checking out the Best-README-Template. If you have a suggestion
*** that would make this better, please fork the repo and create a pull request
*** or simply open an issue with the tag "enhancement".
*** Don't forget to give the project a star!
*** Thanks again! Now go create something AMAZING! :D
-->



<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
-->

<!-- PROJECT LOGO -->
<br />
<div align="center">
  <h3 align="center">Bimbingan Karir Poliklinik Project Menggunakan Laravel</h3>
</div>

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
  </ol>
</details>

<!-- ABOUT THE PROJECT -->
## About The Project
Rest API Django Project:
* Menggunakan Laravel 11
* Menggunakan Laravel Breeze sebagai proses autentikasi
* multi user autentikasi
* terdapat 3 role yang melalui proses login

<p align="right">(<a href="#readme-top">back to top</a>)</p>

### Built With

This section should list any major frameworks/libraries used to bootstrap your project. Leave any add-ons/plugins for the acknowledgements section. Here are a few examples.

* [![Laravel][Laravel]][Laravel-url]
* [![Mysql][Mysql]][Mysql-url]
* [![PHP][PHP]][PHP-url]
* [![Xampp][Xampp]][Xampp-url]

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- GETTING STARTED -->
## Getting Started

Berikut cara untuk mensetting project ini di mesin lokal.

### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/Natanael13533/poliklinik-BK.git
   ```
2. Buka .env.example dan rename .env.example menjadi .env, (isikan sesuai dengan nama database, port, user, dan password)
   ```js
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=database_name
   DB_USERNAME=database_user
   DB_PASSWORD=
   ```
3. Jalankan perintah migrate pada terminal
   ```sh
   php artisan migrate
   ```
4. Import SQL file, dengan membuka xampp lalu nyalakan apache dan Mysql, lalu buka localhost/phpmyadmin, login jika ada password, jika sudah import data sql ke dalam database yang sudah di buat yang memiliki nama yang sama pada DB_DATABASE pada file .env
5. Jalankan perintah untuk menjalankan program
   ```sh
   php artisan serve
   ```

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- USAGE EXAMPLES -->
## Usage

Jika sudah melalui semua tahap instalasi program sudah bisa diakses.

Pengakasesan halaman register dan login:

`AKSES URL`
* Login Admin <br/>
  Admin dapat login dengan menekan tombol "Masuk Sebagai Dokter" pada halaman home.
* Login Dokter <br/>
  Sama dengan admin, dokter juga dapat login dengan menekan tombol "Masuk Sebagai Dokter" pada halaman home.
* Login Pasien <br/>
  Pasien dapat login dengan menekan tombol "Masuk Sebagai Pasien" pada halaman home.
* Register Pasien <br/>
  Register Pasien dapat diakses pada halaman login pasien, yang dimana sebelah kiri tombol "Log In" ada link bernama "Tidak Punya Akun? Daftar Di Sini" jika di tekan maka anda akan masuk ke halaman register pasien.
* Register Dokter <br/>
  Dokter tidak bisa registrasi, namun admin dapat menambahkan data dokter pada dashboard admin, yang nantinya dari data dokter yang sudah di tambahkan, bisa melakukan login dokter.
* Register Admin <br/>
  Bisa di tambahkan secara langsung melalui phpmyadmin, atau shell xampp
* Email dan Password admin <br/>
  jika, sudah melakukan import sql, maka bisa mengakses admin dashboard dengan <br/>
  email : admin@gmail.com <br/>
  password : admin123 

  

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[Laravel]: https://img.shields.io/badge/Laravel-FF2D20?logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com/
[Mysql]: https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white
[Mysql-url]: https://www.mysql.com/
[PHP]: https://img.shields.io/badge/PHP-777BB4?logo=php&logoColor=white
[PHP-url]: https://www.php.net/
[Xampp]: https://img.shields.io/badge/Xampp-F37623?style=for-the-badge&logo=xampp&logoColor=white
[Xampp-url]: https://www.apachefriends.org/
