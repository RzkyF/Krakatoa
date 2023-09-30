<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//copyright Rizki Fadillah XII RPL SMK YAJ DEPOK

//redirect url
$routes->addRedirect('/','Home');
//login routes
$routes->get('/login', 'Auth::login');
$routes->get('/data_log', 'Log::index');

//user routes
$routes->get('/user','User::index');
$routes->get('/user/new','User::new');
$routes->post('/user','User::create');
$routes->get('/user/delete/(:num)','User::delete/$1');

//menu routes
$routes->get('/menu','Menu::index');
$routes->get('/menu/new','Menu::new');
$routes->post('/menu','Menu::create');
$routes->get('/menu/delete/(:num)','Menu::delete/$1');

//order routes
$routes->get('/order','Order::index');
$routes->get('/order/new','Order::new');
$routes->post('/order','Order::create');
$routes->post('/order/pesan', 'Order::detail');
$routes->post('detaildel/(:num)/(:num)', 'Order::deletedetail/$1/$2');
$routes->post('/order/bayar','Order::bayar');
$routes->get('/order/delete/(:num)','Order::delete/$1');
$routes->get('/order/struk/(:num)','Order::cetakStruk/$1');

//routes transaksi dan laporan
$routes->get('/transaksi','Transaksi::index');
$routes->get('/transaksi/LaporanTransaksiPeriode','Transaksi::LaporanTransaksiPeriode');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
