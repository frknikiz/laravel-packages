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
   static $data = array(
            'cusName'=>"Furkan İKİZ",
            'conName'=>"Furkan İKİZ",
            'address'=>"<a href='http://github.com/frknikiz'>Link</a>",
            'pCode'  =>"26100",
            'city'  =>"Eskişehir",
            'country'=>"Turkey"
    );

	public function showPdf()
	{
		$pdf = PDF::loadView('tablo',self::$data);
        return $pdf->stream();
	}
    public function showHtml()
    {
        return View::make('tablo',self::$data);
    }
}
