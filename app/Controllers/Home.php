<?php

namespace App\Controllers;


class Home extends BaseController
{
	public function index() {
	    $this->view('home/index');

	}
}
