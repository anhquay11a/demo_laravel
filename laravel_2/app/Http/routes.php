<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
Route::get('/contact', 'WelcomeController@contact');
Route::get('/about', 'WelcomeController@about');
Route::get('/aboutme', 'PagesController@aboutme');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//Route::controller('/controller','WelcomeController',['contact'=>'contact','about'=>'about']);

view()->share('title', 'Quang Bão');

Route::get('insert', function() {
		Schema::create('chiTietNgayNghi', function ($table) {
	        $table->bigIncrements('id');
	        $table->timestamps();	
	        $table->foreign('nguoiDungId')
	              ->references('id')->on('users')
	              ->onDelete('cascade');
	        $table->string('tieuDe');
	        $table->dateTime('tuNgay');
	        $table->dateTime('denNgay');
	        $table->integer('nguoiNhanId');
	        $table->string('noiDung')->nullable();
			$table->foreign('tinhTrang')
			      ->references('id')->on('trangThai')
			      ->onDelete('cascade');
			$table->binary('daXoa');
	    });
		return "create method";
	});

/*
------------------BEGIN DATABASE------------------------
*/

Route::group(['prefix' => 'database'], function() {

    //Create database
	Route::get('create', function() {
		
	    //Create table Chức Danh
	    Schema::create('chucDanh', function ($table) {
	        $table->Increments('id');
	        $table->string('tenChucDanh');
	        $table->binary('daXoa');
	    });

	    //Create table Khối
	    Schema::create('khoi', function ($table) {
	        $table->Increments('id');
	        $table->string('tenKhoi');
	        $table->binary('daXoa');
	    });

	    //Create table Trạng Thái
	    Schema::create('trangThai', function ($table) {
	        $table->Increments('id');
	        $table->string('loai');
	        $table->binary('daXoa');
	    });

	    //Create table Chi tiết ngày nghỉ
	    Schema::create('chiTietNgayNghi', function ($table) {
	        $table->bigIncrements('id');
	        $table->timestamps();	
	        $table->foreign('nguoiDungId')
	              ->references('id')->on('users')
	              ->onDelete('cascade');
	        $table->string('tieuDe');
	        $table->dateTime('tuNgay');
	        $table->dateTime('denNgay');
	        $table->integer('nguoiNhanId');
	        $table->string('noiDung')->nullable();
			$table->foreign('tinhTrang')
			      ->references('id')->on('trangThai')
			      ->onDelete('cascade');
			$table->binary('daXoa');
	    });
	    return "create method success";
	});

	//Insert table
	Route::get('insert', function() {
		Schema::table('users', function($table){
    		$table->string('hoTen')->after('id');
    		$table->dateTime('ngaySinh');
    		$table->foreign('chucDanhId')
	              ->references('id')->on('chucDanh')
	              ->onDelete('cascade');
    		$table->foreign('khoiId')
	              ->references('id')->on('khoi')
	              ->onDelete('cascade');
    		$table->binary('laPM');
    		$table->binary('laLanhDao');
    		$table->string('nguoiTao');
    		$table->integer('tongNgayPhep');
    		$table->integer('ngayNghiPhep');
    		$table->integer('ngayNghiKhongLuong');
    		$table->binary('daXoa');
		});
		return "insert method success";
	});
});


/*
------------------END DATABASE------------------------
*/