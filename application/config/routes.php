<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = "auth/Login";
//routes for login
$route['Login'] = "auth/Login";

//routes for read data user
$route['Dashboard'] = "user/User";
$route['admin'] = "user/User/admin";
$route['BPM'] = "user/User/user_BPM";
$route['user-prodi'] = "user/User/user_prodi";
$route['user-dosen'] = "user/User/user_dosen";
$route['user-mahasiswa'] = "user/User/user_mahasiswa";

//routes add data user
$route['tambah-user-admin'] = "user/User/tambah_user_admin";
$route['tambah-user-BPM'] = "user/User/tambah_user_bpm";
$route['tambah-user-prodi'] = "user/User/tambah_user_prodi";
$route['tambah-user-dosen'] = "user/User/tambah_user_dosen";
$route['tambah-user-mahasiswa'] = "user/User/tambah_user_mahasiswa";

//routes edit user admin, bpm, dosen, mahasiswa
$route['edit-user-1/(:any)'] = "user/User/edit_user1/$1";

//routes edit user prodi
$route['edit-user-2/(:any)'] = "user/User/edit_user2/$1";
$route['edit-user-3/(:any)'] = "user/User/edit_user3/$1";

//routes for fakultas
$route['fakultas'] = "fakultas/Fakultas";
$route['tambah-fakultas'] = "fakultas/Fakultas/tambah_fakultas";
$route['edit-fakultas/(:any)'] = "fakultas/Fakultas/edit_fakultas/$1";
//routes for prodi
$route['prodi'] = "prodi/Prodi";
$route['tambah-prodi'] = "prodi/Prodi/tambah_prodi";
$route['edit-prodi/(:any)'] = "prodi/Prodi/edit_prodi/$1";
//routes for dosen
$route['dosen'] = "dosen/Dosen";
$route['tambah-dosen'] = "dosen/Dosen/tambah_dosen";
$route['edit-dosen/(:any)'] = "dosen/Dosen/edit_dosen/$1";
//routes for mahasiswa
$route['mahasiswa'] = "mahasiswa/Mahasiswa";
$route['tambah-mahasiswa'] = "mahasiswa/Mahasiswa/tambah_mahasiswa";
$route['edit-mahasiswa/(:any)'] = "mahasiswa/Mahasiswa/edit_mahasiswa/$1";
//routes for pertanyaan
$route['pertanyaan'] = "pertanyaan/Pertanyaan";
$route['tambah-pertanyaan'] = "pertanyaan/Pertanyaan/tambah_pertanyaan";
$route['edit-pertanyaan/(:any)'] = "pertanyaan/Pertanyaan/edit_pertanyaan/$1";
//routes for mata kuliah
$route['matakuliah'] = "matakuliah/Matakuliah";
$route['tambah-matakuliah'] = "matakuliah/Matakuliah/tambah_matakuliah";
$route['edit-matakuliah/(:any)'] = "matakuliah/Matakuliah/edit_matakuliah/$1";
//routes for kuisioner
$route['jawaban'] = "jawaban/Jawaban";