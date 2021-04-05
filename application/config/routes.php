<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller']     =     'auth/Login';
//routes for user module
$route['Dashboard'] = "user/User";
$route['Login'] = "auth/Login";
$route['User/all_user'] = "user/User/all_user";
$route['User/admin_BPM'] = "user/User/admin_BPM";
$route['User/user_prodi'] = "user/User/user_prodi";
$route['User/user_dosen'] = "user/User/user_dosen";
//routes for prodi module
$route['Prodi'] = "prodi/Prodi";
//routes for dosen module
$route['Dosen'] = "dosen/Dosen";
//routes for mahasiswa module
$route['Mahasiswa'] = "mahasiswa/Mahasiswa";