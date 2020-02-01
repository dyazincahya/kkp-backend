# kkp-backend
Service API [kkp-mobile](https://github.com/dyazincahya/kkp-mobile) | S7H UNINDRA 2019

### Instalasi

#### Projek
- Unduh source code projeknya dahulu [disini](https://github.com/dyazincahya/kkp-backend/archive/master.zip).
- Ekstrak file zip projek yang sudah terunduh.
- Salin semua data projek ke folder ```htdocs xampp```.
- Nama folder projeknya beri nama ```kkp-backend```

#### Database
- Buka ```http://localhost/phpmyadmin``` di browser
- Buat database baru dengan nama ```kkp_backend```
- Kemudian import databasenya lewat ```phpmyadmin```
- File databasenya ada di [kkp-backend/database](https://github.com/dyazincahya/kkp-backend/tree/master/database), bisa dilihat di data projek yang tadi sudah di unduh
- Jika nama database tidak sesuai dengan intruksi ini, kamu bisa mengaturnya sendiri di sini [kkp-backend/application/config/database.php](https://github.com/dyazincahya/kkp-backend/blob/master/application/config/database.php)

``` php
$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'kkp_backend',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
```
Pada konfigurasi di atas kamu cukup atur bagian ```username, password dan database```

### API yang sudah tersedia
- [http://localhost/kkp-backend/auth](https://github.com/dyazincahya/kkp-backend/blob/master/application/controllers/Auth.php)
- [http://localhost/kkp-backend/signup](https://github.com/dyazincahya/kkp-backend/blob/master/application/controllers/Signup.php)
