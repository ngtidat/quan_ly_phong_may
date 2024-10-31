<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'Auth'], function() {
    Route::get('/', 'LoginController@login')->name('login');
    Route::post('/', 'LoginController@postLogin');
    Route::get('/logout', 'LoginController@logout')->name('logout');
//    Route::get('/forgot/password', 'ForgotPasswordController@forgotPassword')->name('admin.forgot.password');
});

Route::group(['middleware' =>['auth']], function() {
    Route::get('/home', 'HomeController@index')->name('home')->middleware('permission:quan-tri-toan-bo-he-thong|truy-cap-he-thong');

    Route::group(['prefix' => 'khu-vuc'], function(){
        Route::get('/','KhuVucController@index')->name('khuvuc.index')->middleware('permission:quan-tri-toan-bo-he-thong|danh-sach-khu-vuc');

        Route::get('/create','KhuVucController@create')->name('khuvuc.create')->middleware('permission:quan-tri-toan-bo-he-thong|them-khu-vuc');
        Route::post('/create','KhuVucController@store');

        Route::get('/update/{id}','KhuVucController@edit')->name('khuvuc.update')->middleware('permission:quan-tri-toan-bo-he-thong|sua-khu-vuc');
        Route::post('/update/{id}','KhuVucController@update');

        Route::get('/delete/{id}','KhuVucController@destroy')->name('khuvuc.delete')->middleware('permission:quan-tri-toan-bo-he-thong|xoa-khu-vuc');
    });

    Route::group(['prefix' => 'phong-may'], function(){
        Route::get('/','PhongMayController@index')->name('phongmay.index')->middleware('permission:quan-tri-toan-bo-he-thong|danh-sach-phong-may');

        Route::get('/create','PhongMayController@create')->name('phongmay.create')->middleware('permission:quan-tri-toan-bo-he-thong|them-phong-may');
        Route::post('/create','PhongMayController@store');

        Route::get('/update/{id}','PhongMayController@edit')->name('phongmay.update')->middleware('permission:quan-tri-toan-bo-he-thong|sua-phong-may');
        Route::post('/update/{id}','PhongMayController@update');

        Route::get('/delete/{id}', 'PhongMayController@destroy')->name('phongmay.delete')->middleware('permission:quan-tri-toan-bo-he-thong|xoa-phong-may');
        Route::get('/danh-sach-may/{id}', 'PhongMayController@listComputer')->name('danhsach.maytinh')->middleware('permission:quan-tri-toan-bo-he-thong|danh-sach-may');
    });

    Route::group(['prefix' => 'may-tinh'], function(){

        Route::get('/create/{id}','MayTinhController@create')->name('maytinh.create')->middleware('permission:quan-tri-toan-bo-he-thong|them-may-tinh');
        Route::post('/create/{id}','MayTinhController@store');

        Route::get('/update/{id}','MayTinhController@edit')->name('maytinh.update')->middleware('permission:quan-tri-toan-bo-he-thong|sua-may-tinh');
        Route::post('/update/{id}','MayTinhController@update');

        Route::get('/delete/{id}', 'MayTinhController@destroy')->name('maytinh.delete')->middleware('permission:quan-tri-toan-bo-he-thong|xoa-may-tinh');
        Route::post('/information/{id}', 'MayTinhController@information')->name('information');
    });

    Route::group(['prefix' => 'cau-hinh'], function(){
        Route::get('/','CauHinhController@index')->name('cauhinh.index')->middleware('permission:quan-tri-toan-bo-he-thong|danh-sach-cau-hinh');

        Route::get('/create','CauHinhController@create')->name('cauhinh.create')->middleware('permission:quan-tri-toan-bo-he-thong|them-cau-hinh');
        Route::post('/create','CauHinhController@store');

        Route::get('/update/{id}','CauHinhController@edit')->name('cauhinh.update')->middleware('permission:quan-tri-toan-bo-he-thong|sua-cau-hinh');
        Route::post('/update/{id}','CauHinhController@update');

        Route::get('/delete/{id}', 'CauHinhController@destroy')->name('cauhinh.delete')->middleware('permission:quan-tri-toan-bo-he-thong|xoa-cau-hinh');
    });

    Route::group(['prefix' => 'khoa'], function(){
        Route::get('/','KhoaController@index')->name('khoa.index')->middleware('permission:quan-tri-toan-bo-he-thong|danh-sach-khoa');

        Route::get('/create','KhoaController@create')->name('khoa.create')->middleware('permission:quan-tri-toan-bo-he-thong|them-moi-khoa');
        Route::post('/create','KhoaController@store');

        Route::get('/update/{id}','KhoaController@edit')->name('khoa.update')->middleware('permission:quan-tri-toan-bo-he-thong|chinh-sua-khoa');
        Route::post('/update/{id}','KhoaController@update');

        Route::get('/delete/{id}', 'KhoaController@destroy')->name('khoa.delete')->middleware('permission:quan-tri-toan-bo-he-thong|xoa-khoa');
    });

    Route::group(['prefix' => 'nganh'], function(){
        Route::get('/','NganhController@index')->name('nganh.index')->middleware('permission:quan-tri-toan-bo-he-thong|danh-sach-nganh');

        Route::get('/create','NganhController@create')->name('nganh.create')->middleware('permission:quan-tri-toan-bo-he-thong|them-moi-nganh');
        Route::post('/create','NganhController@store');

        Route::get('/update/{id}','NganhController@edit')->name('nganh.update')->middleware('permission:quan-tri-toan-bo-he-thong|chinh-sua-nganh');
        Route::post('/update/{id}','NganhController@update');

        Route::get('/delete/{id}', 'NganhController@destroy')->name('nganh.delete')->middleware('permission:quan-tri-toan-bo-he-thong|xoa-nganh');
    });

    Route::group(['prefix' => 'mon-hoc'], function(){
        Route::get('/','MonHocController@index')->name('mon.hoc.index')->middleware('permission:quan-tri-toan-bo-he-thong|danh-sach-mon-hoc');

        Route::get('/create','MonHocController@create')->name('mon.hoc.create')->middleware('permission:quan-tri-toan-bo-he-thong|them-moi-mon-hoc');
        Route::post('/create','MonHocController@store');

        Route::get('/update/{id}','MonHocController@edit')->name('mon.hoc.update')->middleware('permission:quan-tri-toan-bo-he-thong|chinh-sua-mon-hoc');
        Route::post('/update/{id}','MonHocController@update');

        Route::get('/delete/{id}', 'MonHocController@destroy')->name('mon.hoc.delete')->middleware('permission:quan-tri-toan-bo-he-thong|xoa-mon-hoc');

        Route::post('/change/branch', 'MonHocController@branch')->name('change.branch');
    });
    Route::group(['prefix' => 'giao-vien'], function(){
        Route::get('/','GiaoVienController@index')->name('giao.vien.index')->middleware('permission:quan-tri-toan-bo-he-thong|danh-sach-giao-vien');

        Route::get('/create','GiaoVienController@create')->name('giao.vien.create')->middleware('permission:quan-tri-toan-bo-he-thong|them-moi-giao-vien');
        Route::post('/create','GiaoVienController@store');

        Route::get('/update/{id}','GiaoVienController@edit')->name('giao.vien.update')->middleware('permission:quan-tri-toan-bo-he-thong|chinh-sua-giao-vien');
        Route::post('/update/{id}','GiaoVienController@update');

        Route::get('/delete/{id}', 'GiaoVienController@destroy')->name('giao.vien.delete')->middleware('permission:quan-tri-toan-bo-he-thong|xoa-giao-vien');
    });

    Route::group(['prefix' => 'group-permission'], function(){
        Route::get('/','GroupPermissionController@index')->name('group.permission.index');
        Route::get('/create','GroupPermissionController@create')->name('group.permission.create');
        Route::post('/create','GroupPermissionController@store');

        Route::get('/update/{id}','GroupPermissionController@edit')->name('group.permission.update');
        Route::post('/update/{id}','GroupPermissionController@update');

        Route::get('/delete/{id}','GroupPermissionController@destroy')->name('group.permission.delete');
    });

    Route::group(['prefix' => 'permission'], function(){
        Route::get('/','PermissionController@index')->name('permission.index');
        Route::get('/create','PermissionController@create')->name('permission.create');
        Route::post('/create','PermissionController@store');

        Route::get('/update/{id}','PermissionController@edit')->name('permission.update');
        Route::post('/update/{id}','PermissionController@update');

        Route::get('/delete/{id}','PermissionController@delete')->name('permission.delete');
    });

    Route::group(['prefix' => 'role'], function(){
        Route::get('/','RoleController@index')->name('role.index');
        Route::get('/create','RoleController@create')->name('role.create');
        Route::post('/create','RoleController@store');

        Route::get('/update/{id}','RoleController@edit')->name('role.update');
        Route::post('/update/{id}','RoleController@update');

        Route::get('/delete/{id}','RoleController@delete')->name('role.delete');
    });

    Route::group(['prefix' => 'user'], function(){
        Route::get('/','UserController@index')->name('user.index')->middleware('permission:quan-tri-toan-bo-he-thong|danh-sach-nguoi-dung');
        Route::get('/create','UserController@create')->name('user.create')->middleware('permission:quan-tri-toan-bo-he-thong|them-moi-nguoi-dung');
        Route::post('/create','UserController@store');

        Route::get('/update/{id}','UserController@edit')->name('user.update')->middleware('permission:quan-tri-toan-bo-he-thong|sua-nguoi-dung');
        Route::post('/update/{id}','UserController@update');

        Route::get('/delete/{id}','UserController@delete')->name('user.delete')->middleware('permission:quan-tri-toan-bo-he-thong|xoa-nguoi-dung');
    });

//    Route::group(['prefix' => 'so-tiet'], function(){
//        Route::get('/','SoTietController@index')->name('so_tiet.index');
//
//        Route::get('/create','SoTietController@create')->name('so_tiet.create');
//        Route::post('/create','SoTietController@store');
//
//        Route::get('/update/{id}','SoTietController@edit')->name('so_tiet.update');
//        Route::post('/update/{id}','SoTietController@update');
//
//        Route::get('/delete/{id}', 'SoTietController@destroy')->name('so_tiet.delete');
//    });

    Route::group(['prefix' => 'phan-cong-giang-day'], function(){
        Route::get('/','PhanCongGiangDayController@index')->name('phan_cong.index')->middleware('permission:quan-tri-toan-bo-he-thong|danh-sach-phan-cong');

        Route::get('/create','PhanCongGiangDayController@create')->name('phan_cong.create')->middleware('permission:quan-tri-toan-bo-he-thong|them-moi-phan-cong');
        Route::post('/create','PhanCongGiangDayController@store');

        Route::get('/select','PhanCongGiangDayController@select')->name('phan_cong.select')->middleware('permission:quan-tri-toan-bo-he-thong|them-moi-phan-cong');
        Route::post('/select','PhanCongGiangDayController@create');

        Route::get('/update/{id}','PhanCongGiangDayController@edit')->name('phan_cong.update')->middleware('permission:quan-tri-toan-bo-he-thong|chinh-sua-phan-cong');
        Route::post('/update/{id}','PhanCongGiangDayController@update');

        Route::get('/delete/{id}', 'PhanCongGiangDayController@destroy')->name('phan_cong.delete')->middleware('permission:quan-tri-toan-bo-he-thong|xoa-phan-cong');
    });
    Route::group(['prefix' => 'thoi-khoa-bieu'], function(){
        Route::get('/','ThoiKhoaBieuController@index')->name('thoi_khoa_bieu.index');
    });
    Route::group(['prefix' => 'thoi_gian_su_dung'], function(){
        Route::get('/','ThoiGianSuDungController@index')->name('thoi_gian_su_dung.index');
    });

});
