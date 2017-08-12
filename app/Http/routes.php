<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/**
 * Model binding into route
 */
// Route::model('blogcategory', 'App\BlogCategory');
// Route::model('blog', 'App\Blog');
// Route::model('file', 'App\File');

Route::pattern('slug', '[a-z0-9- _]+');

Route::group(array('prefix' => 'admin'), function () {

	# Error pages should be shown without requiring login
	Route::get('404', function () {
		return View('admin/404');
	});
	Route::get('500', function () {
		return View::make('admin/500');
	});

	# Lock screen
	Route::get('lockscreen', function () {
		return View::make('admin/lockscreen');
	});

	# All basic routes defined here
	Route::get('signin', array('as' => 'signin', 'uses' => 'AuthController@getSignin'));
	Route::post('signin', 'AuthController@postSignin');
	Route::post('signup', array('as' => 'signup', 'uses' => 'AuthController@postSignup'));
	Route::post('forgot-password', array('as' => 'forgot-password', 'uses' => 'AuthController@postForgotPassword'));
	Route::get('entrar', function () {
		return View::make('admin/entrar');
	});

	# Register2
	Route::get('register2', function () {
		return View::make('admin/register2');
	});
	Route::post('register2', array('as' => 'register2', 'uses' => 'AuthController@postRegister2'));

	/*Route::get('equipamentos', function () {
		return View::make('admin/equipamentos');
	});*/

	Route::get('equipamentos', 'EquipamentoController@lista');

	// Routes for Loja
	Route::post('loja/adiciona', 'LojaController@add')->name('loja_adiciona');
	Route::post('loja/salva', 'LojaController@update')->name('loja_salva');

	Route::get('loja/novo', 'LojaController@create')->name('loja_new');;
	Route::get('loja/lista', 'LojaController@index')->name('loja_index');
	Route::get('loja/mostra/{id}', 'LojaController@show')->name('loja_show');
	Route::get('loja/edita/{id}', 'LojaController@edit')->name('loja_edit');
	Route::get('loja/deletar/{id}', 'LojaController@delete')->name('loja_delete');
	// END Routes for Loja


	// Routes for Setor
	Route::post('setor/adiciona', 'SetorController@add')->name('setor_adiciona');
	Route::post('setor/salva', 'SetorController@update')->name('setor_salva');

	Route::get('setor/novo', 'SetorController@create')->name('setor_new');
	Route::get('setor/lista', 'SetorController@index')->name('setor_index');
	Route::get('setor/mostra/{id}', 'SetorController@show')->name('setor_show');
	Route::get('setor/edita/{id}', 'SetorController@edit')->name('setor_edit');
	Route::get('setor/deletar/{id}', 'SetorController@delete')->name('setor_delete');
	// END Routes for Setor

	// Routes for Marca
	Route::post('marca/adiciona', 'MarcaController@add')->name('marca_adiciona');
	Route::post('marca/salva', 'MarcaController@update')->name('marca_salva');

	Route::get('marca/novo', 'MarcaController@create')->name('marca_new');
	Route::get('marca/lista', 'MarcaController@index')->name('marca_index');
	Route::get('marca/mostra/{id}', 'MarcaController@show')->name('marca_show');
	Route::get('marca/edita/{id}', 'MarcaController@edit')->name('marca_edit');
	Route::get('marca/deletar/{id}', 'MarcaController@delete')->name('marca_delete');
	// END Routes for Marca

	// Routes for Fornecedor
	Route::post('fornecedor/adiciona', 'FornecedorController@add')->name('fornecedor_adiciona');
	Route::post('fornecedor/salva', 'FornecedorController@update')->name('fornecedor_salva');

	Route::get('fornecedor/novo', 'FornecedorController@create')->name('fornecedor_new');
	Route::get('fornecedor/lista', 'FornecedorController@index')->name('fornecedor_index');
	Route::get('fornecedor/mostra/{id}', 'FornecedorController@show')->name('fornecedor_show');
	Route::get('fornecedor/edita/{id}', 'FornecedorController@edit')->name('fornecedor_edit');
	Route::get('fornecedor/deletar/{id}', 'FornecedorController@delete')->name('fornecedor_delete');
	// END Routes for Fornecedor

	// Routes for Equipamentos
	Route::post('equipamento/adiciona', 'EquipamentoController@add')->name('equipamento_adiciona');
	Route::post('equipamento/salva', 'EquipamentoController@update')->name('equipamento_salva');

	Route::get('equipamento/novo', 'EquipamentoController@create')->name('equipamento_new');
	Route::get('equipamento/lista', 'EquipamentoController@index')->name('equipamento_index');
	Route::get('equipamento/mostra/{id}', 'EquipamentoController@show')->name('equipamento_show');
	Route::get('equipamento/edita/{id}', 'EquipamentoController@edit')->name('equipamento_edit');
	Route::get('equipamento/deletar/{id}', 'EquipamentoController@delete')->name('equipamento_delete');
	// END Routes for Equipamentos

	// Routes for Loja
	Route::post('grupo/adiciona', 'GrupoController@add')->name('grupo_adiciona');
	Route::post('grupo/salva', 'GrupoController@update')->name('grupo_salva');

	Route::get('grupo/novo', 'GrupoController@create')->name('grupo_new');;
	Route::get('grupo/lista', 'GrupoController@index')->name('grupo_index');
	Route::get('grupo/mostra/{id}', 'GrupoController@show')->name('grupo_show');
	Route::get('grupo/edita/{id}', 'GrupoController@edit')->name('grupo_edit');
	Route::get('grupo/deletar/{id}', 'GrupoController@delete')->name('grupo_delete');
	// END Routes for Loja

	//Routes pra Relatorio


	Route::get('relatorio/equipamento/index', 'RelatorioController@equipamentoIndex');
	Route::get('relatorio/equipamento/lista', 'RelatorioController@equipamentoLista')->name('relatorio_lista');



	// Routes for HistoricoEquipamentos
	Route::post('historicoequipamento/adiciona', 'HistoricoEquipamentoController@add')->name('historico_equipamento_adiciona');
	Route::get('historicoequipamento/apaga/{id}', 'HistoricoEquipamentoController@delete')->name('historico_delete');
	
	// END Routes for HistoricoEquipamentos

	Route::get('/', function () {
		return View::make('admin/index');
	});

	# Forgot Password Confirmation
	Route::get('forgot-password/{userId}/{passwordResetCode}', array('as' => 'forgot-password-confirm', 'uses' => 'AuthController@getForgotPasswordConfirm'));
	Route::post('forgot-password/{userId}/{passwordResetCode}', 'AuthController@postForgotPasswordConfirm');

	# Logout
	Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@getLogout'));

	# Account Activation
	Route::get('activate/{userId}/{activationCode}', array('as' => 'activate', 'uses' => 'AuthController@getActivate'));
});

Route::group(array('prefix' => 'admin', 'middleware' => 'SentinelAdmin'), function () {
    # Dashboard / Index
	Route::get('/', array('as' => 'dashboard','uses' => 'JoshController@showHome'));



	# User Management
    Route::group(array('prefix' => 'users'), function () {
    	Route::get('/', array('as' => 'users', 'uses' => 'UsersController@getIndex'));
    	Route::get('create', array('as' => 'create/user', 'uses' => 'UsersController@getCreate'));
        Route::post('create', 'UsersController@postCreate');
        Route::get('{userId}/edit', array('as' => 'users.update', 'uses' => 'UsersController@getEdit'));
        Route::post('{userId}/edit', 'UsersController@postEdit');
    	Route::get('{userId}/delete', array('as' => 'delete/user', 'uses' => 'UsersController@getDelete'));
		Route::get('{userId}/confirm-delete', array('as' => 'confirm-delete/user', 'uses' => 'UsersController@getModalDelete'));
		Route::get('{userId}/restore', array('as' => 'restore/user', 'uses' => 'UsersController@getRestore'));
		Route::get('{userId}', array('as' => 'users.show', 'uses' => 'UsersController@show'));
	});
	Route::get('deleted_users',array('as' => 'deleted_users','before' => 'Sentinel', 'uses' => 'UsersController@getDeletedUsers'));

	# Group Management
    Route::group(array('prefix' => 'groups'), function () {
        Route::get('/', array('as' => 'groups', 'uses' => 'GroupsController@getIndex'));
        Route::get('create', array('as' => 'create/group', 'uses' => 'GroupsController@getCreate'));
        Route::post('create', 'GroupsController@postCreate');
        Route::get('{groupId}/edit', array('as' => 'update/group', 'uses' => 'GroupsController@getEdit'));
        Route::post('{groupId}/edit', 'GroupsController@postEdit');
        Route::get('{groupId}/delete', array('as' => 'delete/group', 'uses' => 'GroupsController@getDelete'));
        Route::get('{groupId}/confirm-delete', array('as' => 'confirm-delete/group', 'uses' => 'GroupsController@getModalDelete'));
        Route::get('{groupId}/restore', array('as' => 'restore/group', 'uses' => 'GroupsController@getRestore'));
    });
    /*routes for blog*/
	Route::group(array('prefix' => 'blog'), function () {
		Route::get('/', array('as' => 'blogs', 'uses' => 'BlogController@getIndex'));
		Route::get('create', array('as' => 'create/blog', 'uses' => 'BlogController@getCreate'));
		Route::post('create', 'BlogController@postCreate');
		Route::get('{blog}/edit', array('as' => 'update/blog', 'uses' => 'BlogController@getEdit'));
		Route::post('{blog}/edit', 'BlogController@postEdit');
		Route::get('{blog}/delete', array('as' => 'delete/blog', 'uses' => 'BlogController@getDelete'));
		Route::get('{blog}/confirm-delete', array('as' => 'confirm-delete/blog', 'uses' => 'BlogController@getModalDelete'));
		Route::get('{blog}/restore', array('as' => 'restore/blog', 'uses' => 'BlogController@getRestore'));
        Route::get('{blog}/show', array('as' => 'blog/show', 'uses' => 'BlogController@show'));
        Route::post('{blog}/storecomment', array('as' => 'restore/blog', 'uses' => 'BlogController@storecomment'));
	});

    /*routes for blog category*/
	Route::group(array('prefix' => 'blogcategory'), function () {
		Route::get('/', array('as' => 'blogcategories', 'uses' => 'BlogCategoryController@getIndex'));
		Route::get('create', array('as' => 'create/blogcategory', 'uses' => 'BlogCategoryController@getCreate'));
		Route::post('create', 'BlogCategoryController@postCreate');
		Route::get('{blogcategory}/edit', array('as' => 'update/blogcategory', 'uses' => 'BlogCategoryController@getEdit'));
		Route::post('{blogcategory}/edit', 'BlogCategoryController@postEdit');
		Route::get('{blogcategory}/delete', array('as' => 'delete/blogcategory', 'uses' => 'BlogCategoryController@getDelete'));
		Route::get('{blogcategory}/confirm-delete', array('as' => 'confirm-delete/blogcategory', 'uses' => 'BlogCategoryController@getModalDelete'));
		Route::get('{blogcategory}/restore', array('as' => 'restore/blogcategory', 'uses' => 'BlogCategoryController@getRestore'));
	});

	/*routes for file*/
	Route::group(array('prefix' => 'file'), function () {
		Route::post('create', 'FileController@postCreate');
		Route::post('createmulti', 'FileController@postFilesCreate');
		Route::delete('delete', 'FileController@delete');
	});

	Route::get('crop_demo', function () {
        return redirect('admin/imagecropping');
    });
    Route::post('crop_demo','JoshController@crop_demo');

	/* laravel example routes */
	# datatables
	Route::get('datatables', 'DataTablesController@index');
	Route::get('datatables/data', array('as' => 'admin.datatables.data', 'uses' => 'DataTablesController@data'));

	# Remaining pages will be called from below controller method
	# in real world scenario, you may be required to define all routes manually

	Route::get('{name?}', 'JoshController@showView');

});

#FrontEndController
Route::get('login', array('as' => 'login','uses' => 'FrontEndController@getLogin'));
Route::post('login','FrontEndController@postLogin');
Route::get('register', array('as' => 'register','uses' => 'FrontEndController@getRegister'));
Route::post('register','FrontEndController@postRegister');
Route::get('activate/{userId}/{activationCode}',array('as' =>'activate','uses'=>'FrontEndController@getActivate'));
Route::get('forgot-password',array('as' => 'forgot-password','uses' => 'FrontEndController@getForgotPassword'));
Route::post('forgot-password','FrontEndController@postForgotPassword');
# Forgot Password Confirmation
Route::get('forgot-password/{userId}/{passwordResetCode}', array('as' => 'forgot-password-confirm', 'uses' => 'FrontEndController@getForgotPasswordConfirm'));
Route::post('forgot-password/{userId}/{passwordResetCode}', 'FrontEndController@postForgotPasswordConfirm');
# My account display and update details
Route::group(array('middleware' => 'SentinelUser'), function () {
	Route::get('my-account', array('as' => 'my-account', 'uses' => 'FrontEndController@myAccount'));
	Route::post('my-account', 'FrontEndController@updateAccount');
});
Route::get('logout', array('as' => 'logout','uses' => 'FrontEndController@getLogout'));
# contact form
Route::post('contact',array('as' => 'contact','uses' => 'FrontEndController@postContact'));

#frontend views
Route::get('/', array('as' => 'home', function () {
    return View::make('index');
}));

Route::get('blog', array('as' => 'blog', 'uses' => 'BlogController@getIndexFrontend'));
Route::get('blog/{slug}/tag', 'BlogController@getBlogTagFrontend');
Route::get('blogitem/{slug?}', 'BlogController@getBlogFrontend');
Route::post('blogitem/{blog}/comment', 'BlogController@storeCommentFrontend');

Route::get('{name?}', 'JoshController@showFrontEndView');
# End of frontend views

Route::get('pessoas', 'PessoasController@index');
