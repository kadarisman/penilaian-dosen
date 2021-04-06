<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller']     =     'auth/Login';
//routes for user module
$route['Dashboard'] = "user/User";
$route['Login'] = "auth/Login";
$route['admin'] = "user/User/admin";
$route['BPM'] = "user/User/user_BPM";
$route['user-prodi'] = "user/User/user_prodi";
$route['user-dosen'] = "user/User/user_dosen";
$route['user-mahasiswa'] = "user/User/user_mahasiswa";
$route['User/admin_BPM'] = "user/User/admin_BPM";

//routes for prodi module
$route['Prodi'] = "prodi/Prodi";
//routes for dosen module
$route['Dosen'] = "dosen/Dosen";
//routes for mahasiswa module
$route['Mahasiswa'] = "mahasiswa/Mahasiswa";