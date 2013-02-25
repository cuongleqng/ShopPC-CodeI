<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home/cat/linh-kien-may-tinh/6";
$route['404_override'] = '';
$route['cat/:any'] = 'home/cat';
$route['detail/:any'] = 'home/detail';
$route['lien-he']  = 'home/lienhe';
$route['search/:any'] = 'home/search';
$route['tin-tuc'] = 'home/tintuc';
$route['tin-tuc/:num'] = 'home/tintuc';
$route['gioi-thieu'] = 'home/gioithieu';
$route['chinh-sach'] = 'home/chinhsach';
$route['bao-hanh'] = 'home/baohanh';
$route['duong-di'] = 'home/duongdi';
$route['khuyen-mai'] = 'home/khuyenmai';
$route['download'] = 'home/download';
$route['chon-cau-hinh'] = 'home/choncauhinh';
$route['print/:any'] = 'baogia/printProduct';
$route['print'] = 'baogia/printProduct';
$route['gio-hang'] = 'home/giohang';


/*
    admin
*/ 
$route['admin']='admin/login';




/* End of file routes.php */
/* Location: ./application/config/routes.php */