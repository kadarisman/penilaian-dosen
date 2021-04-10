<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller']     =     'auth/Login';
//routes for user module, read data
$route['Dashboard'] = "user/User";
$route['Login'] = "auth/Login";
$route['admin'] = "user/User/admin";
$route['BPM'] = "user/User/user_BPM";
$route['user-prodi'] = "user/User/user_prodi";
$route['user-dosen'] = "user/User/user_dosen";
$route['user-mahasiswa'] = "user/User/user_mahasiswa";
$route['User/admin_BPM'] = "user/User/admin_BPM";

//routes for fakultas module
$route['fakultas'] = "fakultas/Fakultas";
//routes for prodi module
$route['prodi'] = "prodi/Prodi";
//routes for dosen module
$route['dosen'] = "dosen/Dosen";
//routes for mahasiswa module
$route['Mahasiswa'] = "mahasiswa/Mahasiswa";
//routes for pertanyaan module
$route['pertanyaan'] = "pertanyaan/Pertanyaan";
//routes for mata kuliah module
$route['matakuliah'] = "matakuliah/Matakuliah";
//routes for kuisioner module
$route['jawaban'] = "jawaban/Jawaban";