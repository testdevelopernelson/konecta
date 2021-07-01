<?php

/*

|--------------------------------------------------------------------------

| Panel Administrativo

|--------------------------------------------------------------------------

 */

Route::get('/', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

Route::group(['middleware' => 'admin', 'namespace' => 'Admin'], function () {

    Route::resource('sections', 'SectionController');
    Route::resource('contents', 'ContentController');
    Route::resource('admins', 'AdminController');
    Route::resource('slider', 'SliderController');
    Route::resource('article', 'ArticleController');
    Route::resource('job', 'JobController');
    Route::resource('category', 'CategoryController');
    Route::resource('product', 'ProductController');
    Route::get('gallery-product/{id}', 'ProductController@gallery')->name('product.gallery');
    Route::resource('frecuentquestion', 'FrecuentQuestionController');
    Route::resource('zone', 'ZoneController');
    Route::resource('headquarter', 'HeadquarterController');
    Route::resource('productdocument', 'ProductDocumentController');
    Route::resource('documentcategory', 'DocumentCategoryController');
    Route::resource('document', 'DocumentController');
    Route::resource('city', 'CityController');
    Route::resource('quote', 'QuoteController');
    Route::get('quote-download/{id}', 'QuoteController@download')->name('quote.download');
    Route::resource('user', 'UserController');
    Route::resource('formcontact', 'FormContactController');    
    Route::resource('formdistributor', 'FormDistributorController');    
    Route::resource('formnewsletter', 'FormNewsletterController');             

    Route::resource('translation', 'TranslationController');
    Route::resource('translationelement', 'TranslationElementController');

    Route::get('fields/{c}/{s}', 'ContentController@fields')->name('contents.fields');
    Route::put('fields', 'ContentController@save_fields')->name('contents.save.fields');


    Route::resource('admins', 'AdminController');

    Route::resource('users', 'UserController');

    Route::get('settings', 'SettingsController@index')->name('settings');
    Route::put('settings', 'SettingsController@update')->name('settings_update');

    Route::get('featured-article/{id}', 'ArticleController@featured')->name('article.featured');
    Route::get('featured-product/{id}', 'ProductController@featured')->name('product.featured');

    Route::get('export-formcontact', 'FormContactController@export')->name('formcontact.export');
    Route::get('export-distributor', 'FormDistributorController@export')->name('formdistributor.export');
    Route::get('export-newsletter', 'FormNewsletterController@export')->name('formnewsletter.export');

/*routes_crudy*/

     Route::group(['prefix' => 'ajax'], function () {
          Route::post('/order', 'AjaxController@order');
          Route::post('/order_article', 'ArticleController@order')->name('article.order');          
          Route::post('/order_slider', 'SliderController@order')->name('slider.order');          
          Route::post('/order_category', 'CategoryController@order')->name('category.order'); 
          Route::post('/order_product', 'ProductController@order')->name('product.order'); 
          Route::post('/order_frecuentquestion', 'FrecuentQuestionController@order')->name('frecuentquestion.order'); 
          Route::post('/order_product_image', 'ProductController@images_sort')->name('product.order_image');
          Route::post('/order_zone', 'ZoneController@order')->name('zone.order');
          Route::post('/order_headquarter', 'HeadquarterController@order')->name('headquarter.order');
          Route::post('/order_productdocument', 'ProductDocumentController@order')->name('productdocument.order');
          Route::post('/documentcategory', 'DocumentCategoryController@order')->name('documentcategory.order');
          Route::post('/document', 'DocumentController@order')->name('document.order');

          Route::post('published-category', 'CategoryController@published')->name('category.published');
          Route::post('published-product', 'ProductController@published')->name('product.published');          
          Route::post('published-article', 'ArticleController@published')->name('article.published');
          Route::post('/images-product', 'ProductController@images')->name('product.images');
          Route::post('delete-image-product', 'ProductController@delete_image');

          Route::post('/delete-file-product', 'ProductController@delete_file');
          Route::post('/delete-file-productdocument', 'ProductDocumentController@delete_file');
          Route::post('/delete-file-document', 'DocumentController@delete_file');

          
          Route::post('show-section', 'SectionController@show')->name('sections.published');

     });

    Route::group(['prefix' => 'lfmanager', 'middleware' => ['admin']], function () {

     \UniSharp\LaravelFilemanager\Lfm::routes();

   });

});