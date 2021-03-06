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
/*
switch ( $_SERVER['HTTP_HOST'] ) {
    case 'kirulads/admin':
        $route['default_controller'] = 'Base';
    default:
        $route['default_controller'] = 'Base';
    break;
}
*/
$route['default_controller'] = 'Base';

$route['admin'] = 'admin/dashboard/login/index';
$route['admin/logout'] = 'admin/dashboard/account/logout';
$route['admin/dashboard'] = 'admin/dashboard/account/index';
$route['admin/ads/all'] = 'admin/dashboard/ads/index';
$route['admin/ads/view/(:num)'] = 'admin/dashboard/ads/view/$1';
$route['admin/category'] = 'admin/category/index';
/**
 * Public Routes 
 * 
 */
$route['user/login'] = 'public/user/login/index';
$route['user/register'] = 'public/user/register/index';
$route['user/account'] = 'public/user/account/index';
$route['user/account/myads'] = 'public/user/account/index';

$route['user/account/settings'] = 'public/user/account/settings';
$route['user/forgotPassword'] = 'public/user/handler/forgot_password';
$route['user/resetPassword'] = 'public/user/handler/reset_password';
$route['user/reset'] = 'public/user/handler/reset';
$route['user/accountSettings'] = 'public/user/handler/account_settings';

// Post Ad Routes
$route['post-ad/category'] = 'public/post-ad/handler/category';
$route['post-ad/category/(:num)/location'] = 'public/post-ad/handler/location';
$route['post-ad/details/category/(:num)/location/(:num)'] = 'public/post-ad/handler/details';
$route['post-ad/complete/token/(:any)'] = 'public/post-ad/handler/ad_complete';
$route['post-ad/details/category/(:num)/location/(:num)/edit/(:any)'] = 'public/post-ad/handler/edit';
$route['image'] = 'public/post-ad/image';
$route['image/delete'] = 'public/post-ad/image/delete';
$route['image/featured'] = 'public/post-ad/image/featured';

$route['ad/(:any)'] = 'public/ad/detail/ad';
$route['ad/delete/(:any)'] = 'public/post-ad/handler/delete';
$route['ads'] = 'public/ad/detail/ads';
$route['ads/(:any)'] = 'public/ad/detail/ads';
$route['ads/(:any)/(:any)'] = 'public/ad/detail/ads';
$route['ads/(:any)/(:any)/(:any)'] = 'public/ad/detail/ads';

$route['help'] = 'public/help/handler/index';
$route['about-us'] = 'public/about/handler/index';
$route['privacy-policy'] = 'public/about/handler/privacy';
$route['terms-and-conditions'] = 'public/about/handler/terms';
$route['sitemap'] = 'public/about/handler/sitemap';

// 404 Page 
$route['404_override'] = 'Myerror';

// URL dashes
$route['translate_uri_dashes'] = TRUE;

