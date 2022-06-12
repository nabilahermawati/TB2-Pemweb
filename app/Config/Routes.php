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
$routes->get('/', 'HomeController::index');
$routes->get('/add-user', 'CvController::add');
$routes->get('/cv/(:num)', 'CvController::index/$1');
$routes->get('/update/(:num)', 'CvController::update/$1');

$routes->post('/create/user', 'CvController::createUser');
$routes->post('/save/user/(:num)', 'CvController::updateUser/$1');
$routes->post('/save/contact/(:num)', 'CvController::updateContact/$1');
$routes->post('/save/work/(:num)', 'CvController::updateWork/$1');
$routes->post('/save/achievement-certificate/(:num)', 'CvController::updateAchievementCertificate/$1');

$routes->delete('/delete/user/(:num)', 'CvController::deleteUser/$1');
$routes->delete('/delete/work/(:num)', 'CvController::deleteWork/$1');
$routes->delete('/delete/achievement-certificate/(:num)', 'CvController::deleteAchievementCertificate/$1');

$routes->get('/html-to-pdf', 'ClientController::index');


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
