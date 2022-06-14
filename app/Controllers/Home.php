<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{

		$data = [
			'titulo' => ' | Home',
			'subtitulo' => 'Pagina Inicial'
		];

		return view('Home/index', $data);
	}
}
