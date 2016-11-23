<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	//
	public function aboutme(){
		$name = 'Quang Bao';
		$age = '24';
		$data = [];
		$data['name'] = 'Bao Quang';
		$data['age'] = '23';
		// return view("pages/aboutme")->with([
		// 									'name'=> $name,
		// 									'age'=> $age 
		// 								]);
		return view("pages.aboutme", $data);
	}

}
