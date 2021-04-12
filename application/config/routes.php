<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller']     =     'auth/Login';
//routes for user module, read data
$route['Dashboard'] = "user/User";
$route['Login'] = "auth/Login";
$route['admin'] = "user/User/admin";
$route['tambah-user-admin'] = "user/User/tambah_user_admin";
$route['BPM'] = "user/User/user_BPM";
$route['tambah-user-BPM'] = "user/User/tambah_user_bpm";
$route['user-prodi'] = "user/User/user_prodi";
$route['tambah-user-prodi'] = "user/User/tambah_user_prodi";
$route['user-dosen'] = "user/User/user_dosen";
$route['tambah-user-dosen'] = "user/User/tambah_user_dosen";
$route['user-mahasiswa'] = "user/User/user_mahasiswa";
$route['tambah-user-mahasiswa'] = "user/User/tambah_user_mahasiswa";
$route['User/admin_BPM'] = "user/User/admin_BPM";

//routes for fakultas module
$route['fakultas'] = "fakultas/Fakultas";
$route['tambah-fakultas'] = "fakultas/Fakultas/tambah_fakultas";
//routes for prodi module
$route['prodi'] = "prodi/Prodi";
$route['tambah-prodi'] = "prodi/Prodi/tambah_prodi";
//routes for dosen module
$route['dosen'] = "dosen/Dosen";
$route['tambah-dosen'] = "dosen/Dosen/tambah_dosen";
//routes for mahasiswa module
$route['mahasiswa'] = "mahasiswa/Mahasiswa";
$route['tambah-mahasiswa'] = "mahasiswa/Mahasiswa/tambah_mahasiswa";
//routes for pertanyaan module
$route['pertanyaan'] = "pertanyaan/Pertanyaan";
$route['tambah-pertanyaan'] = "pertanyaan/Pertanyaan/tambah_pertanyaan";
//routes for mata kuliah module
$route['matakuliah'] = "matakuliah/Matakuliah";
$route['tambah-matakuliah'] = "matakuliah/Matakuliah/tambah_matakuliah";
//routes for kuisioner module
$route['jawaban'] = "jawaban/Jawaban";