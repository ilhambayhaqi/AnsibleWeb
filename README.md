# AnsibleWeb
AnsibleWeb merupakan sebuah aplikasi web yang digunakan untuk melakukan controlling server menggunakan Ansible.

## Fitur
1. Login dan Register
2. Update Profil
3. Melakukan Start, Stop, Restart pada Nginx, Apache2, dan MySQL

## Requirements
* Ubuntu
* Web Server (Apache2/Nginx)
* MySQL
* PHP
* Ansible

## Instalasi
1. Membuat database dengan melakukan import pada file ajk.sql
2. Memasukkan folder 'ajk' kedalam folder web server
3. Melakukan konfigurasi database pada file config.php
Pada file tersebut terdapat
```
$db_host = "localhost";
$db_user = "root";
$db_pass = "ppqooqiiq";
$db_name = "ajk";
```
Sesuaikan konfigurasi pada ```$db_host```, ```$db_user```, ```$db_pass```, ```$db_name``` dengan konfigurasi pada database yang telah dibuat.

4. Meletakkan direktori folder ansible pada ```/etc/ansible/```
5. Pada file hosts dalam folder ansible lakukan konfigurasi pada hosts server
6. Melakukan remote pada hosts server dengan mengenerate ssh key dan melakukan copy ssh key
``` 
ssh keygen
ssh copy-id your_host@host
```
7. Pada file ```/etc/sudoers``` pastikan telah world-writable karena fungsi shell_exec() memerlukan ```sudo``` dalam melakukan eksekusi. Untuk memberikan privileges tambahkan
```www-data ALL=NOPASSWD: ALL```

## Testing
1. Login ke aplikasi web sebagai admin
2. Lakukan testing pada tab Ansible
3. Status dapat dilihat pada status bar ataupun dengan melakukan ```systemctl status your_service``` pada hosts server
