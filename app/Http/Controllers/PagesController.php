<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
	public function main()
	{
		$view = view('main', ['records' => [1]]);

		return $view;

		//return view('main');
	}
}

?>