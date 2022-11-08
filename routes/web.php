<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Ruta publica al ususario final 
 *
 * @return View Login
 */

//\Debugbar::disable();

Route::get('/','AuthController@showLogin')->name('login');

Route::post('/postLogin', 'AuthController@postLogin')->name("postLogin");

Route::get('/logout', 'AuthController@logOut')->name('logout');

Route::get('/mslogin', 'AuthController@login')->name('loginaz');

/**azure AD login */
Route::get('/auth/redirect', 'AuthController@authredirect')->name('azredirect');
Route::get('/auth/callback', 'AuthController@callback')->name('azcallback');


/**
 * Rutas para la parte de Dashboard
 * 
 * @return View
 */


Route::get('/getCP/{id}', 'CPController@show');
//PDF
/*
Route::get('/PDFtest', 'PDFController@test');
Route::group(['prefix' => 'pdf', 'middleware' => 'auth'], function () {
    Route::get('/AlianzaQuotation', 'PDFController@alianzaQuotation');

});*/


Route::get('/getCurrency', 'NavigationController@getCurrency')->name('Currency');

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'rol']], function () {


    Route::group(['prefix' => 'api/sap' ], function(){

        Route::get('token', 'CotizacionSAPController@AuthToken')->name('AuthToken');

    });

    Route::group(['prefix' => 'syscom'],function(){
        //Rutas de api syscom (busqueda de productos, categorias, marcsss)
        Route::get('buscarproductos', 'AcinfoController@index')->name('Syscomindex');
        Route::get('getSyscomToken', 'AcinfoController@getSyscomToken')->name('getSyscomToken');
        Route::post('searchSyscomProductos', 'AcinfoController@searchSyscomProductos')->name('searchSyscomProductos');
    });


    /*Buscador*/
    Route::get('/buscar', 'SearcherController@search')->name('search');
    
    Route::get('/monitor', 'MonitorController@index')->name('monitor-avance');
    Route::get('/monitor/getSLP', 'MonitorController@searchSalesPersons')->name('getSLP');
    Route::get('/monitor/getAllSLP', 'MonitorController@getSalesPersons')->name('getAllSLP');
    Route::get('/monitor/getProgress', 'MonitorController@getProgress')->name('getProgress');
    Route::post('monitor/getOrdersInfo', 'MonitorController@getOrdersInfo')->name('getOrdersInfo');

    Route::group(['prefix' => 'kpi'], function(){
        Route::get('getSLPInfo', 'KPIController@getSLPInfo')->name('getSLPInfo');
        Route::get('getGralInfo', 'KPIController@getGeneralInfo')->name('getGralInfo');
        Route::get('getPartners', 'KPIController@getPartners')->name('getPartners');
        Route::get('getPendAuthCot', 'KPIController@getPendAuthCot')->name('getPendAuthCot');
        Route::get('getQuotationsFrequency', 'KPIController@getQuotationsFrequency')->name('getQuotationsFrequency');
    });


    Route::get('/', function(){

        return view('index');
    
    })->name('dashboard');

    Route::group(['prefix' => 'cuenta'], function () {
        Route::get('verPerfil', 'AccountController@index')->name('profile');
        Route::post('updateUser', 'AccountController@updateUser')->name('updateUser');
        Route::get('getInfo', 'AccountController@getInfo')->name('getInfo');
    });
    Route::group(['prefix' => 'reportes'], function () {
        Route::get('estado-cuenta/getStatement', 'StatementController@getStatement')->name('getStatement');
        Route::get('comisiones', 'CommissionsController@index')->name('commissions');
        Route::get('comisiones/getEstimateReport', 'CommissionsController@getEstimateReport')->name('getEstimateReport');
        Route::get('comisiones/getResumeReport', 'CommissionsController@getResumeReport')->name('getResumeReport');
    });
    
    Route::group(['prefix' => 'cotizaciones'], function () {

        Route::post('sap/validate', 'CotizacionSAPController@validateQuotation')->name('validateQuotation');


        /*
         * Nueva cotizacion y los resources
         */
        Route::get('nueva-cotizacion', 'CotizacionController@index')->name('nueva-cotizacion');
        Route::get('nueva-cotizacion/getCliente', 'CotizacionController@getClienteAll')->name('getCliente');
        Route::get('nueva-cotizacion/getClienteAllEntrega', 'CotizacionController@getClienteAllEntrega')->name('getClienteAllEntrega');
        Route::get('nueva-cotizacion/getClienteData', 'CotizacionController@getClienteData')->name('getClienteData');
        //entregas
        Route::get('nueva-cotizacion/getClienteDataE', 'CotizacionController@getClienteDataE')->name('getClienteDataE');
        //Puntos MBR
        Route::get('nueva-cotizacion/getClienteDataPuntos', 'CotizacionController@getClienteDataPuntos')->name('getClienteDataPuntos');
        Route::get('nueva-cotizacion/getArticuloAll', 'CotizacionController@getArticuloAll' )->name('getArticuloAll');
        Route::get('nueva-cotizacion/getClienteAllNew', 'CotizacionController@getClienteAllNew')->name('getClienteAllNew');
        Route::get('nueva-cotizacion/getArticuloData', 'CotizacionController@getArticuloData')->name('getArticuloData');
        Route::get('nueva-cotizacion/getStock', 'CotizacionController@getStock')->name('getStock');
        Route::get('nueva-cotizacion/getNotasData', 'CotizacionController@getNotasData')->name('getNotasData');
        Route::get('nueva-cotizacion/getNotasNosapData', 'CotizacionController@getNotasNosapData')->name('getNotasNosapData');
        Route::post('nueva-cotizacion/sendCotizacion', 'CotizacionController@sendCotizacion')->name('sendCotizacion');
        Route::post('nueva-cotizacion/getCotizacionesAll', 'CotizacionController@getAllCotizaciones')->name('getAllCotizaciones');
        Route::post('nueva-cotizacion/getDataCotizacionReview', 'CotizacionController@getDataCotizacionReview')->name('getDataCotizacionReview');
        Route::post('nueva-cotizacion/getDataCotizacionReviewAll', 'CotizacionController@getDataCotizacionReviewAll')->name('getDataCotizacionReviewAll');
        Route::get('nueva-cotizacion/show/{id}', 'CotizacionController@show')->name('show-cotizacion');
        Route::post('nueva-cotizacion/show/payment', 'CotizacionController@setPayment')->name('setPayment');
        Route::post('nueva-cotizacion/deleteProduct', "CotizacionController@deleteProduct")->name('deleteProduct');
        Route::post('nueva-cotizacion/updateCotizacion', "CotizacionController@updateCotizacion")->name('updateCotizacion');
        Route::post('nueva-cotizacion/sendmailaut', 'CotizacionController@sendmailaut')->name('sendmailaut');
        Route::post('nueva-cotizacion/sendmailgrant', 'CotizacionController@sendmailgrant')->name('sendmailgrant');
        Route::get('/pdf/{numCotizacion}', 'PDFController@pdfQuotation')->name('pdfQuotation');
        
        /*Routas para pruebas de modulo de cotizacion*/
        Route::get('nueva-cotizacionPRUEBAS', 'CotizacionControllerPRUEBAS@index')->name('nueva-cotizacionPRUEBAS');
        Route::get('nueva-cotizacionPRUEBAS/getCliente', 'CotizacionControllerPRUEBAS@getClienteAll')->name('getClientePRUEBAS');
        Route::get('nueva-cotizacionPRUEBAS/getClienteData', 'CotizacionControllerPRUEBAS@getClienteData')->name('getClienteDataPRUEBAS');
        Route::get('nueva-cotizacionPRUEBAS/getArticuloAll', 'CotizacionControllerPRUEBAS@getArticuloAll' )->name('getArticuloAllPRUEBAS');
        Route::get('nueva-cotizacionPRUEBAS/getArticuloAllNew', 'CotizacionControllerPRUEBAS@getArticuloAllNew' )->name('getArticuloAllNew');
        Route::get('nueva-cotizacionPRUEBAS/getArticuloData', 'CotizacionControllerPRUEBAS@getArticuloData')->name('getArticuloDataPRUEBAS');
        Route::get('nueva-cotizacionPRUEBAS/getArticuloData', 'CotizacionControllerPRUEBAS@getArticuloData')->name('getArticuloDataPRUEBAS');
        Route::get('nueva-cotizacionPRUEBAS/getStock', 'CotizacionControllerPRUEBAS@getStock')->name('getStockPRUEBAS');
        Route::get('nueva-cotizacionPRUEBAS/getNotasData', 'CotizacionControllerPRUEBAS@getNotasData')->name('getNotasDataPRUEBAS');
        Route::post('nueva-cotizacionPRUEBAS/sendCotizacionpruebas', 'CotizacionControllerPRUEBAS@sendCotizacion')->name('sendCotizacionPRUEBAS');
        Route::post('nueva-cotizacionPRUEBAS/getCotizacionesAll', 'CotizacionControllerPRUEBAS@getAllCotizaciones')->name('getAllCotizacionesPRUEBAS');
        Route::post('nueva-cotizacionPRUEBAS/getDataCotizacionReview', 'CotizacionControllerPRUEBAS@getDataCotizacionReview')->name('getDataCotizacionReviewPRUEBAS');
        Route::post('nueva-cotizacionPRUEBAS/getDataCotizacionReviewAll', 'CotizacionControllerPRUEBAS@getDataCotizacionReviewAll')->name('getDataCotizacionReviewAllPRUEBAS');
        //Route::get('nueva-cotizacionPRUEBAS/show/{id}', 'CotizacionControllerPRUEBAS@show')->name('show-cotizacionPRUEBAS');
        Route::get('nueva-cotizacion/showPRUEBAS/{id}', 'CotizacionControllerPRUEBAS@show')->name('show-cotizacionPRUEBAS');
        /*----------------------------------------------- Para mostrar cotizacion de renta  --------------------------------------------------------------------*/
        Route::post('nueva-cotizacionPRUEBAS/sendCotizacionrenta', 'CotizacionControllerPRUEBAS@sendCotizacionrenta')->name('sendCotizacionPRUEBASrenta');
        Route::get('nueva-cotizacionPRUEBASrenta', 'CotizacionControllerPRUEBAS@indexrenta')->name('nueva-cotizacionPRUEBASrenta');
        Route::get('nueva-cotizacion/show/renta/{id}', 'CotizacionControllerPRUEBAS@showrenta')->name('show-cotizacionRenta');
        Route::get('/pdf2/{numCotizacion}', 'PDFControllerPRUEBAS@pdfQuotationRenta')->name('pdfQuotation2');
        Route::post('nueva-cotizacionPRUEBAS/updateCotizacionrenta', "CotizacionControllerPRUEBAS@updateCotizacionrenta")->name('updateCotizacionrenta');
        /*--------------------------------------------------------------------------------------------------------------------------------------------------------*/
        Route::post('nueva-cotizacionPRUEBAS/show/payment', 'CotizacionControllerPRUEBAS@setPayment')->name('setPaymentPRUEBAS');
        Route::post('nueva-cotizacionPRUEBAS/deleteProduct', "CotizacionControllerPRUEBAS@deleteProduct")->name('deleteProductPRUEBAS');
        Route::post('nueva-cotizacionPRUEBAS/updateCotizacion', "CotizacionControllerPRUEBAS@updateCotizacion")->name('updateCotizacionPRUEBAS');
        Route::post('nueva-cotizacionPRUEBAS/sendmailaut', 'CotizacionControllerPRUEBAS@sendmailaut')->name('sendmailautPRUEBAS');
        Route::post('nueva-cotizacionPRUEBAS/sendmailgrant', 'CotizacionControllerPRUEBAS@sendmailgrant')->name('sendmailgrantPRUEBAS');
        Route::get('/pdfPRUEBAS/{numCotizacion}/{auxprom?}', 'PDFControllerPRUEBAS@pdfQuotation')->name('pdfQuotationPRUEBAS');
        
        Route::post('nueva-cotizacionPRUEBAS/getPaymentInfo', 'CotizacionControllerPRUEBAS@getPaymentInfo')->name('getPaymentInfo');
        
        /*Route::get('alta-cliente', function () {
            return view('theme.cotizaciones.alta-cliente');
        })->name('alta-cliente');*/
        Route::get('alta-cliente', 'CotizacionController@altaCliente')->name('alta-cliente');
        Route::get('alta-clientepruebas', 'CotizacionController@altaClientepruebas')->name('alta-clientepruebas');
        Route::post('editClienteData', 'CotizacionController@editClienteData')->name('editClienteData');

        //Ruta pára prueba de consulta de monedas
        //Route::get('nueva-cotizacionPRUEBAS/getMoneda', 'CotizacionControllerPRUEBAS@getMoneda')->name('getMoneda');

        Route::resource('cliente_nosap', 'ClienteNoSAPController', [
            'names' => [
                'index' => 'cliente_nosap'
            ]
        ]);

        Route::get('buscar-cotizacion', 'CotizacionController@searchCoti')->name('buscar-cotizacion');
        
        Route::get('nuevo-articulo','ArticulosController@newArticulo')->name('nuevo-articulo');
        Route::get('nuevo-articuloPRUEBAS','ArticulosControllerPRUEBAS@newArticulo')->name('nuevo-articuloPRUEBAS');

        /*Clientes*/
        Route::get('clientes', function(){
            return View('theme.cotizaciones.ver-cliente');
        });
        Route::get('getClientInfo', 'CotizacionController@getClientInfo')->name('getClientInfo');
        Route::post('getClienteDataId','CotizacionController@getClienteDataId')->name('getClienteDataId');
        Route::post('deleteCliente','CotizacionController@deleteCliente')->name('deleteCliente');
        
        
    });
    
    Route::group(['prefix' => 'transferencia'], function(){

        Route::get('/','TransferenciaController@Index');
        Route::post('/getDocument','TransferenciaController@searchDocument')->name('TransferSearchDocument');

        Route::get('/SolicitudTransferenia', 'TransferenciaController@SolicitudTransferenia')
            ->name('SolicitudTransferenia');

        Route::get('/FindAllByCardCode','TransferenciaController@FindAllByCardCode')->name('FindAllByCardCode');
        Route::get('/FindAllByCardName','TransferenciaController@FindAllByCardName')->name('FindAllByCardName');

        Route::get('/FindAllInfo', 'TransferenciaController@FindAllInfo')->name('FindAllInfo');
        Route::get('/FindAllProduct', 'TransferenciaController@FindAllProduct')->name('FindAllProduct');
        Route::get('/FindAllProductName', 'TransferenciaController@FindAllProductName')->name('FindAllProductName');
        Route::get('/FindAllProductById', 'TransferenciaController@FindAllProductById')->name('FindAllProductById');   

    });

    /*Articulos*/
    Route::get('articulos', function(){
        return View('theme.articulos.ver');
    });


    Route::group(['prefix' => 'pedidos'], function () {

        Route::group(['prefix' => 'buscar'], function () {
            Route::get('pedidos', function () {
                return view('theme.pedidos.reporte-pedidos');
            })->name('pedidos');
        });
        Route::get('buscar', function () {
            return view('theme.pedidos.buscar-pedido');
        })->name('buscar-pedido');

    });

    Route::group(['prefix' => 'entregas'], function () {
        Route::get('buscar-entregas', 'DeliverController@index')->name('buscar-entrega');
        Route::get('buscar-entregas/getAllDelivers', 'DeliverController@getAllDelivers')->name('getAllDelivers');
        Route::get('buscar-entregas/getDeliver', 'DeliverController@getDeliver')->name('getDeliver');
        Route::get('buscar-entregas/getReport', 'DeliverController@getReport')->name('getReport');

        // para pdf de hoja de entrega
        Route::get('/pdf/{id}', 'PDFController@pdfHojaentrega')->name('pdfHojaentrega');
        //Route::get('/buscar-he/buscar','DeliverController@buscar')->name('buscarHE');
        Route::get('/crearhoja','DeliverController@showCrear')->name('showCrearHE');
        Route::post('/saveDelivery','DeliverController@saveDelivery')->name('saveDelivery');
        //Vista de buscar entrega
        Route::resource('buscarHE', 'DeliverController', [
            'names' => [
                'index' => 'buscarHE'
            ]
        ]);
        //Editar hoja de entrega
        Route::get('editarHE/{id}','DeliverController@editarHE')->name('editarHE');


        //Route::get('/getall','DeliverController@getall')->name('getallEntregas');
    });

    Route::group(['prefix' => 'facturas'], function () {
        Route::get('buscar-facturas', 'InvoiceController@index')->name('buscar-facturas');
        Route::get('buscar-facturas/getInvoice', 'InvoiceController@getInvoice')->name('getInvoice');
        Route::get('buscar-facturas/getAllInvoices', 'InvoiceController@getAllInvoices')->name('getAllInvoices');
        Route::get('buscar-facturas/getNewEDoc', 'InvoiceController@getNewEDoc')->name('getNewEDoc');
    });
    Route::group(['prefix' => 'solicitudes'], function () {
        
        Route::get('credito', function () {
            return view('theme.solicitudes.credito');
        })->name("scredito");

        Route::resource('alta-cliente-sap', 'ClienteSAPController', [
            'names' => [
                'index' => 'scliente'
            ]
        ]);

    });

    Route::group(['prefix' => 'administracion'], function () {

        Route::resource('notes', 'NotesController');
        
        Route::get('general', function () {
            return view('theme.administracion.general');
        })->name('general');

        Route::get('cotizaciones', 'CotizacionControllerPRUEBAS@indexadmin')->name('cotizaciones');
        
        Route::post('getCotConfig', 'CotizacionControllerPRUEBAS@getCotConfig')->name('getCotConfig');
        Route::post('setCotC', 'CotizacionControllerPRUEBAS@setcotc')->name('setCotC');
        Route::post('setCotR', 'CotizacionControllerPRUEBAS@setcotr')->name('setCotR');
        
        /*Route::resource('cotizaciones', 'CotizacionControllerPRUEBAS', [
            'names' => [
                'indexadmin' => 'cotizaciones'
            ]
        ]);*/
        
        Route::get('usuarios', 'AuthController@ShowUsers')->name('usuarios');
       // Route::get('usuariosPruebas', 'AuthControllerPruebas@ShowUsers')->name('usuariosPruebas');
        Route::post('setRol', 'AuthController@setRol')->name('setRol');
        Route::post('getRol', 'AuthController@getRol')->name('getRol');
    
        Route::resource('herramientas', 'ToolsController');

        Route::resource('slider', 'SliderController', [
            'names' => [
                'index' => 'slider'
            ]
        ]);
        
        Route::resource('usuariospruebas', 'AuthControllerPruebas', [
            'names' => [
                'index' => 'usuariospruebas'
            ]
        ]);        
        
        Route::resource('policy', 'PolicyController', [
            'names' => [
                'index' => 'policy'
            ]
        ]);
        Route::resource('specs', 'SpecsController', [
            'names' => [
                'index' => 'specs'
            ]
        ]);

        Route::resource('capacitacion', 'CapacitacionController', [
            'names' => [
                'index' => 'capacitacion'
            ]
        ]);
        Route::resource('articulos', 'ArticulosController', [
            'names' => [
                'index' => 'articulos'
            ]
        ]);
        Route::resource('articulosPRUEBAS', 'ArticulosControllerPRUEBAS', [
            'names' => [
                'index' => 'articulosPRUEBAS'
            ]
        ]);

        Route::get('personalizacion', 'MiscController@getCustomisationIndex')->name('customisation');


        /*Heplers*/
        Route::post('saveColors', 'MiscController@saveColors')->name('saveColors');
        Route::get('loadColors', 'MiscController@loadColors')->name('loadColors');
        Route::get('getArticles', 'ArticulosController@getArticles')->name('getArticles');
        Route::get('getArticleInfo', 'ArticulosController@getArticleInfo')->name('getArticleInfo');

        Route::get('biblioteca', function () {
            return view('theme.biblioteca.biblioteca');
        })->name('biblioteca');

    });    
    
    Route::group(['prefix' => 'puntosmbr'], function(){
        
        Route::resource('registrar', 'PuntosMbrController', [
            'names' => [
                'index' => 'registrar-cliente'
            ]
        ]);
        
        Route::post('savepoints', 'PuntosMbrController@savepoints')->name('savepoints');
    });
});


Route::group(['prefix' => 'superadmin', 'middleware' => 'auth'], function () {

    Route::get('/', function(){

        return view('clean-theme.index');
    
    })->name('sDashboard'); 

    Route::get('agregar', 'SuperadminController@indexCreate')->name('create');
    Route::get('ver', 'SuperadminController@indexRead')->name('read');
    Route::get('actualizar', 'SuperadminController@indexUpdate')->name('update');
    Route::get('actualizar-f', 'SuperadminController@getUpdatePopup')->name('update-f');
    Route::get('eliminar', 'SuperadminController@indexDelete')->name('delete');
    Route::get('testSAP', 'SuperadminController@testSAP')->name('testSAP');
    Route::get('testMySQL', 'SuperadminController@testMySQL')->name('testMySQL');
    Route::get('getSQLFile', 'SuperadminController@getSQLFile')->name('getSQLFile');
    Route::post('createCompany', 'SuperadminController@createCompany')->name('createCompany');
    Route::resource('companies' ,'SuperadminController' );
});


/**********
Ruta de sap di api
***********/

Route::get('company', 'AuthControllerPruebas@sapconn')->name('company');

/********
    Rutas momentaneas
*******/

Route::get('send','MailController@send');
/*Route::get('/preview_mail', 'MailController@preview');
Route::get('/mailable', 'MailController@test');*/

Route::get('/refrencias-cruzadas', function(){
    return 'Construccion';
})->name('refrencias-cruzadas');

Route::get('/antiguedad-saldo', function(){
    return 'Construccion';
})->name('antiguedad-saldo');

Route::get('/estados-cuenta', function(){
    return 'Construccion';
})->name('estados-cuenta');


Route::get('/pruebaMBR','CPController@prueba')->name('pruebaMBR');
