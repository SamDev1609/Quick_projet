<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Route login
$routes->get('/', 'LoginController::index');
//$routes->get('/', 'LoginController::index');
$routes->post('/login', 'LoginController::login');
$routes->get('/dashbord', 'LoginController::dashbord');
$routes->get('/logout', 'LoginController::logout');

//---------------------------------------------------------------------

//Routes operations
$routes->get('/operations', 'OperationController::index');

//Routes operations
$routes->get('/create_operation', 'OperationController::create');

//Routes operations
$routes->get('/create_un', 'OperationController::create_un');

//Add operations
$routes->get('/operations/add_operations', 'OperationController::add_operations');

//Save operations 
$routes->post('/operations/save', 'OperationController::save');

//Get operations by ID
$routes->get('/operations/show/(:num)', 'OperationController::show/$1');

//Get operations to edit
$routes->get('/operations/edit/(:num)', 'OperationController::edit/$1');

//Delete operations
$routes->get('/operations/delete/(:num)', 'OperationController::delete/$1');

//Update operations
$routes->post('/operations/update/(:num)', 'OperationController::update/$1');

// ***********************Supply routes*****************************
//Routes operations
$routes->get('/create_supply', 'SupplyController::create');
//Routes operations
$routes->get('/supply', 'SupplyController::index');

//Add supply
$routes->get('/supply/add_supply', 'SupplyController::add_supply');

//Save supply 
$routes->post('/supply/save', 'SupplyController::save');

//Get supply by ID
$routes->get('/supply/show/(:num)', 'SupplyController::show/$1');

//Get supply to edit
$routes->get('/supply/edit/(:num)', 'SupplyController::edit/$1');

//Delete supply
$routes->get('/supply/delete/(:num)', 'SupplyController::delete/$1');

//Update supply
$routes->post('/supply/update/(:num)', 'SupplyController::update/$1');

// ***********************Supply routes*****************************

//Routes budget
$routes->get('/budgets', 'BudgetController::index');

//Get budget to edit
$routes->get('/budget/edit/(:num)', 'BudgetController::edit/$1');

//Delete budget
$routes->get('/budget/delete/(:num)', 'BudgetController::delete/$1');

//Update budget
$routes->post('/budget/update/(:num)', 'BudgetController::update/$1');

// ***********************Loans routes*****************************
//Routes operations
$routes->get('/create_loan', 'LoanController::create');
//Routes budget
$routes->get('/loans', 'LoanController::index');

//Save supply 
$routes->post('/loan/save', 'LoanController::save');

//Get budget to edit
$routes->get('/loan/edit/(:num)', 'LoanController::edit/$1');

//Get budget to edit
$routes->get('/loan/edit/(:num)', 'LoanController::edit/$1');

//Get loan buy_loan
$routes->get('/loan/buy_loan/(:num)', 'LoanController::buy_loan/$1');

//Delete loan
$routes->get('/loan/delete/(:num)', 'LoanController::delete/$1');

//Update loan
$routes->post('/loan/update/(:num)', 'LoanController::update/$1');

// ***********************Investissements*****************************
//Routes operations
//$routes->get('/create_loan', 'LoanController::create');
//Routes budget
$routes->get('/investments', 'InvestmentController::index');

//Save supply 
$routes->post('/investments/save', 'InvestmentController::save');

//Get budget to edit
$routes->get('/investments/edit/(:num)', 'InvestmentController::edit/$1');

//Get budget to edit
$routes->get('/investments/edit/(:num)', 'InvestmentController::edit/$1');

//Get investment buy_investment
$routes->get('/investments/retir_investissement/(:num)', 'InvestmentController::retir_investissement/$1');

//Delete investment
$routes->get('/investments/delete/(:num)', 'InvestmentController::delete/$1');

//Update investment
$routes->post('/investments/update/(:num)', 'InvestmentController::update/$1');


//---------------------------------------------------------------------

//Routes obtenir tous les raports
$routes->get('/reports', 'ReportsController::index');

//Reports data
$routes->get('/reports/show/(:num)', 'ReportsController::show/$1');

// ***********************Investissements*****************************
//Routes operations
//$routes->get('/create_loan', 'LoanController::create');
//Routes budget
$routes->get('/customers', 'CustomerController::index');

//Save supply 
 $routes->post('/customer/save', 'CustomerController::save');

/*//Get budget to edit*/

//Routes obtenir tous les raports
$routes->get('/stats_client', 'ClientstatsController::index');

//Reports data
$routes->get('/reports/show/(:num)', 'ClientstatsController::show/$1');


//---------------------------------------------------------------------





