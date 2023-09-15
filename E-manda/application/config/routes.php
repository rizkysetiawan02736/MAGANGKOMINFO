<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = 'Kustom404';
$route['translate_uri_dashes'] = FALSE;

$route['tabelagenda']='Cetak/hasil';
$route['tabelagendaadmin']='Cetak/hasiladmin';
$route['tabeluser']='User';
$route['dataprofil']='Profile';
$route['tabeluser']='User';
$route['tambahagenda']='Agenda/create';
$route['dashboard']='Login/home';
$route['cetakagenda']='Cetak';
$route['cetakagendaadmin']='Cetak/cetakadmin';
$route['cetakexcel']='Cetak/cetak_excel';
$route['daftar']='Register';
$route['masuk']='Login/logiin';
$route['tambahdatauser']='User/create';
$route['kirimnotif']='Send';
$route['carinohp']='Send/cari';
$route['cariiduser']='Agenda/cari';
$route['tabelpenugasan']='Penugasan';
// $route['tabelbertugas']='Penugasan/bertugas';


$route['ubah-user/(:num)']='User/edit/$1';
$route['lihat-user/(:num)']='User/show/$1';
$route['hapus-user/(:num)']='User/destroy/$1';

$route['hapus-agenda/(:num)']='Agenda/destroy/$1';
$route['ubah-agenda/(:num)']='Agenda/edit/$1';
$route['lihat-agenda/(:num)']='Agenda/show/$1';
$route['penugasan-agenda/(:num)']='Agenda/penugasan/$1';
$route['hapus-penugasan/(:num)']='Penugasan/destroy/$1';

$route['tabelbertugas/(:num)']='Penugasan/bertugas/$1';

$route['uh/(:num)']='Approval/hadir_pribadi/$1';
$route['ud/(:num)']='Approval/diwakilkan/$1';
// $route['ubah-keterangan/(:num)']='Agenda/keterangan/$1';
