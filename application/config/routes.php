<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = "auth/Login";
//routes for login
$route['Login'] = "auth/Login";
$route['Dashboard'] = "user/User";

//routes for get profil
$route['profil'] = "user/User/profil";

//routes for admin read data user
$route['admin'] = "user/User/admin";
$route['BPM'] = "user/User/user_BPM";
$route['user-prodi'] = "user/User/user_prodi";
$route['user-dosen'] = "user/User/user_dosen";
$route['user-mahasiswa'] = "user/User/user_mahasiswa";

//routes for admin add data user
$route['tambah-user-admin'] = "user/User/tambah_user_admin";
$route['tambah-user-BPM'] = "user/User/tambah_user_bpm";
$route['tambah-user-prodi'] = "user/User/tambah_user_prodi";
$route['tambah-user-dosen'] = "user/User/tambah_user_dosen";
$route['tambah-user-mahasiswa'] = "user/User/tambah_user_mahasiswa";
$route['tambah-akun-dosen/(:any)'] = "user/User/tambah_akun_dosen_takterdata/$1";
$route['tambah-akun-mahasiswa/(:any)'] = "user/User/tambah_akun_mahasiswa_takterdata/$1";

//routes for admin edit user admin, bpm, dosen, mahasiswa
$route['edit-user-1/(:any)'] = "user/User/edit_user1/$1";

//routes for admin edit user prodi
$route['edit-user-2/(:any)'] = "user/User/edit_user2/$1";

//routes for admin read master data
$route['fakultas'] = "fakultas/Fakultas";
$route['prodi'] = "prodi/Prodi";
$route['dosen'] = "dosen/Dosen";
$route['mahasiswa'] = "mahasiswa/Mahasiswa";
$route['matakuliah'] = "matakuliah/Matakuliah";
$route['pertanyaan'] = "pertanyaan/Pertanyaan";
$route['nilai'] = "nilai/Nilai/get_all_nilai";


//routes for admin add master data
$route['tambah-fakultas'] = "fakultas/Fakultas/tambah_fakultas";
$route['tambah-prodi'] = "prodi/Prodi/tambah_prodi";
$route['tambah-dosen'] = "dosen/Dosen/tambah_dosen";
$route['tambah-data-dosen/(:any)'] = "dosen/Dosen/tambah_dosen_takterdata/$1";
$route['tambah-mahasiswa'] = "mahasiswa/Mahasiswa/tambah_mahasiswa";
$route['tambah-data-mahasiswa/(:any)'] = "mahasiswa/Mahasiswa/tambah_mahasiswa_takterdata/$1";
$route['tambah-pertanyaan'] = "pertanyaan/Pertanyaan/tambah_pertanyaan";
$route['tambah-matakuliah'] = "matakuliah/Matakuliah/tambah_matakuliah";

//routes for admin edit master data
$route['edit-fakultas/(:any)'] = "fakultas/Fakultas/edit_fakultas/$1";
$route['edit-dosen/(:any)'] = "dosen/Dosen/edit_dosen/$1";
$route['edit-prodi/(:any)'] = "prodi/Prodi/edit_prodi/$1";
$route['edit-mahasiswa/(:any)'] = "mahasiswa/Mahasiswa/edit_mahasiswa/$1";
$route['edit-matakuliah/(:any)'] = "matakuliah/Matakuliah/edit_matakuliah/$1";
$route['edit-pertanyaan/(:any)'] = "pertanyaan/Pertanyaan/edit_pertanyaan/$1";

//routes for prodi read data user
$route['user-dosen-prodi'] = "user/User/user_dosen_prodi";
$route['user-mahasiswa-prodi'] = "user/User/user_mahasiswa_prodi";

//routes for prodi add data user
$route['tambah-user-dosen-prodi'] = "user/User/tambah_user_dosen_prodi";
$route['tambah-user-mahasiswa-prodi'] = "user/User/tambah_user_mahasiswa_prodi";
$route['tambah-akun-dosen-prodi/(:any)'] = "user/User/tambah_akun_dosen_takterdata_prodi/$1";
$route['tambah-akun-mahasiswa-prodi/(:any)'] = "user/User/tambah_akun_mahasiswa_takterdata_prodi/$1";

//routes for prodi edit user
$route['edit-user-1-prodi/(:any)'] = "user/User/edit_user1_prodi/$1";

//routes for prdoi read master data
$route['dosen-prodi'] = "dosen/Dosen_prodi";
$route['mahasiswa-prodi'] = "mahasiswa/Mahasiswa_prodi";
$route['matakuliah-prodi'] = "matakuliah/Matakuliah_prodi";

//routes for prodi add master data
$route['tambah-dosen-prodi'] = "dosen/Dosen/tambah_dosen_prodi";
$route['tambah-data-dosen-prodi/(:any)'] = "dosen/Dosen/tambah_dosen_takterdata_prodi/$1";
$route['tambah-mahasiswa-prodi'] = "mahasiswa/Mahasiswa/tambah_mahasiswa_prodi";
$route['tambah-data-mahasiswa-prodi/(:any)'] = "mahasiswa/Mahasiswa/tambah_mahasiswa_takterdata_prodi/$1";
$route['tambah-matakuliah-prodi'] = "matakuliah/Matakuliah/tambah_matakuliah_prodi";

//routes forprodi edit master data
$route['edit-dosen-prodi/(:any)'] = "dosen/Dosen/edit_dosen_prodi/$1";
$route['edit-mahasiswa-prodi/(:any)'] = "mahasiswa/Mahasiswa/edit_mahasiswa_prodi/$1";
$route['edit-matakuliah-prodi/(:any)'] = "matakuliah/Matakuliah/edit_matakuliah_prodi/$1";

//routes for mahasiswa
$route['nilai'] = "nilai/Nilai/get_nilai_mahasiswa";