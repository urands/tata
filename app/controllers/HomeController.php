<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		$smarty = new Smarty();
		
		//$smarty->debugging = true;
		
		$smarty->setTemplateDir(app_path().'/views');
		$smarty->setCompileDir(storage_path().'/compile');
		$smarty->setConfigDir(app_path().'/views');
		$smarty->setCacheDir(storage_path().'/cache');
		
		//Core::test();

       // Tata\TataCore::test();

        Debug::info($this);

		return $smarty->display('index.php');
		
		//return View::make('package::view.name');
		
		
		//return View::make('test2345');
	}

}
