<?php
/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;


$routes->setRouteClass(DashedRoute::class);

$routes->scope('/', function (RouteBuilder $builder) {
    
    $builder->connect('/', ['controller' => 'Reports', 'action' => 'index']);
    $builder->connect('/relatorios', ['controller' => 'Reports', 'action' => 'index']);
    
    /*
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $builder->connect('/pages/*', 'Pages::display');
    
    $builder->connect('/bancos', ['controller' => 'banks', 'action' => 'index']);
    $builder->connect('/bancos/cadastrar/*', ['controller' => 'banks', 'action' => 'add']);
    $builder->connect('/bancos/listar/*', ['controller' => 'banks', 'action' => 'list']);
    $builder->connect('/bancos/detalhar/*', ['controller' => 'banks', 'action' => 'view']);
    $builder->connect('/bancos/editar/*', ['controller' => 'banks', 'action' => 'add']);
    $builder->connect('/bancos/deletar/*', ['controller' => 'banks', 'action' => 'delete']);

    $builder->connect('/contas', ['controller' => 'Accounts', 'action' => 'index']);
    $builder->connect('/contas/listar/*', ['controller' => 'Accounts', 'action' => 'list']);
    $builder->connect('/contas/detalhar/*', ['controller' => 'Accounts', 'action' => 'view']);
    $builder->connect('/contas/cadastrar/*', ['controller' => 'Accounts', 'action' => 'add']);
    $builder->connect('/contas/editar/*', ['controller' => 'Accounts', 'action' => 'add']);
    $builder->connect('/contas/deletar/*', ['controller' => 'Accounts', 'action' => 'delete']);

    $builder->connect('/pagamento-movimentacoes/listar-entradas', ['controller' => 'Payments', 'action' => 'listEntries']);
    $builder->connect('/pagamento-movimentacoes/listar-saidas', ['controller' => 'Payments', 'action' => 'listOutputs']);
    
    $builder->connect('/pagamentos', ['controller' => 'Payments', 'action' => 'index']);
    $builder->connect('/pagamentos/listar', ['controller' => 'Payments', 'action' => 'list']);
    $builder->connect('/pagamentos/cadastrar/*', ['controller' => 'Payments', 'action' => 'add']);
    $builder->connect('/pagamentos/editar/*', ['controller' => 'Payments', 'action' => 'add']);
    $builder->connect('/pagamentos/detalhar/*', ['controller' => 'Payments', 'action' => 'view']);
    $builder->connect('/pagamentos/deletar/*', ['controller' => 'Payments', 'action' => 'delete']);
    $builder->connect('/pagamentos/listar-entradas', ['controller' => 'Payments', 'action' => 'listEntries']);
    $builder->connect('/pagamentos/listar-saidas', ['controller' => 'Payments', 'action' => 'listOutputs']);
     
    $builder->connect('/parcelas', ['controller' => 'Installments', 'action' => 'index']);
    $builder->connect('/parcelas/listar/*', ['controller' => 'Installments', 'action' => 'list']);
    $builder->connect('/parcelas/detalhar/*', ['controller' => 'Installments', 'action' => 'view']);
    $builder->connect('/parcelas/editar/*', ['controller' => 'Installments', 'action' => 'add']);
    $builder->connect('/parcelas/cadastrar/*', ['controller' => 'Installments', 'action' => 'add']);
    $builder->connect('/parcelas/deletar/*', ['controller' => 'Installments', 'action' => 'delete']);

    $builder->connect('/pessoas', ['controller' => 'Persons', 'action' => 'index']);
    $builder->connect('/pessoas/listar/*', ['controller' => 'Persons', 'action' => 'list']);
    $builder->connect('/pessoas/detalhar/*', ['controller' => 'Persons', 'action' => 'view']);
    $builder->connect('/pessoas/cadastrar/*', ['controller' => 'Persons', 'action' => 'add']);
    $builder->connect('/pessoas/editar/*', ['controller' => 'Persons', 'action' => 'add']);

    $builder->connect('/tipo-pessoas', ['controller' => 'PersonCategories', 'action' => 'index']);
    $builder->connect('/tipo-pessoas/listar/*', ['controller' => 'PersonCategories', 'action' => 'list']);
    $builder->connect('/tipo-pessoas/detalhar/*', ['controller' => 'PersonCategories', 'action' => 'view']);
    $builder->connect('/tipo-pessoas/editar/*', ['controller' => 'PersonCategories', 'action' => 'add']);
    $builder->connect('/tipo-pessoas/cadastrar/*', ['controller' => 'PersonCategories', 'action' => 'add']);
    $builder->connect('/tipo-pessoas/deletar/*', ['controller' => 'PersonCategories', 'action' => 'delete']);
  
    $builder->connect('/usuarios', ['controller' => 'Users', 'action' => 'index']);
    $builder->connect('/usuarios/listar/*', ['controller' => 'Users', 'action' => 'list']);
    $builder->connect('/usuarios/detalhar/*', ['controller' => 'Users', 'action' => 'view']);
    $builder->connect('/usuarios/cadastrar/*', ['controller' => 'Users', 'action' => 'add']);
    $builder->connect('/usuarios/editar/*', ['controller' => 'Users', 'action' => 'add']);
    $builder->connect('/usuarios/deletar/*', ['controller' => 'Users', 'action' => 'delete']);
    $builder->connect('/usuarios/login/*', ['controller' => 'Users', 'action' => 'login']);
    $builder->connect('/usuarios/logout/*', ['controller' => 'Users', 'action' => 'logout']);
 
    $builder->fallbacks();
});

/*
 * If you need a different set of middleware or none at all,
 * open new scope and define routes there.
 *
 * ```
 * $routes->scope('/api', function (RouteBuilder $builder) {
 *     // No $builder->applyMiddleware() here.
 *     
 *     // Parse specified extensions from URLs
 *     // $builder->setExtensions(['json', 'xml']);
 *     
 *     // Connect API actions here.
 * });
 * ```
 */
