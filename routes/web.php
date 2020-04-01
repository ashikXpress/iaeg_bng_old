<?php

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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



//Auth::routes();
Auth::routes(['register'=>false]);




Route::group(['middleware' => ['auth']], function() {

    Route::resource('roles','RoleController');

    Route::resource('users','UserController');

});

Route::namespace('Admin')->middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('dashboard','DashboardController@index')->name('dashboard');

    //about text
    Route::get('about/update','DashboardController@aboutUpdate')->name('about.update');
    Route::post('about/update','DashboardController@aboutUpdateSubmit')->name('about.update.submit');
    Route::post('about/image/submit','DashboardController@aboutImageSubmit')->name('about.image.submit');
    Route::get('about/image/delete/{id}','DashboardController@aboutImageDelete')->name('about.image.delete');
    Route::post('about/image/update/','DashboardController@aboutImageUpdate')->name('about.image.update');
    Route::get('social/links','DashboardController@socialLinks')->name('social.links');
    Route::post('social/links/{id}','DashboardController@socialLinksUpdate')->name('social.links.update');

    // Slider
    Route::get('slider', 'SliderController@index')->name('all.slider');
    Route::get('slider/add', 'SliderController@add')->name('slider.form');
    Route::post('slider/add', 'SliderController@addPost')->name('slider.save');
    Route::get('slider/edit/{id}', 'SliderController@edit')->name('slider.edit');
    Route::post('slider/update/{id}', 'SliderController@editPost')->name('slider.update');
    Route::get('slider/delete/{id}', 'SliderController@delete')->name('slider.delete');

    // Gallery
    Route::get('gallery', 'GalleryController@index')->name('all.gallery');
    Route::get('gallery/add', 'GalleryController@add')->name('gallery.form');
    Route::post('gallery/add', 'GalleryController@addPost')->name('gallery.save');
    Route::get('gallery/edit/{id}', 'GalleryController@editGallery')->name('gallery.edit');
    Route::post('gallery/update/{id}', 'GalleryController@updateGallery')->name('gallery.update');
    Route::get('gallery/delete/{id}', 'GalleryController@deleteGallery')->name('gallery.delete');

    //Gallery category

    Route::get('gallery/category/add', 'GalleryController@galleryCategory')->name('gallery.category.form');
    Route::post('gallery/category/add', 'GalleryController@galleryCategorySave')->name('gallery.category.save');

    // News basic
    Route::get('news/basic', 'NewsController@basicNewsAll')->name('all.basic.news');
    Route::get('news/basic/add', 'NewsController@basicNewsForm')->name('basic.news.form');
    Route::post('news/basic/add', 'NewsController@basicNewsSave')->name('basic.news.save');
    Route::get('news/basic/edit/{id}', 'NewsController@editBasicNews')->name('basic.news.edit');
    Route::post('news//basic/update/{id}', 'NewsController@updateBasicNews')->name('basic.news.update');
    Route::get('news/basic/delete/{id}', 'NewsController@deleteBasicNews')->name('basic.news.delete');

    // News letter
    Route::get('news/letter', 'NewsController@NewsLetterAll')->name('all.news.letter');
    Route::get('news/letter/add', 'NewsController@NewsLetterForm')->name('news.letter.form');
    Route::post('news/letter/add', 'NewsController@NewsLetterSave')->name('news.letter.save');
    Route::get('news/letter/edit/{id}', 'NewsController@editNewsLetter')->name('news.letter.edit');
    Route::post('news//letter/update/{id}', 'NewsController@updateNewsLetter')->name('news.letter.update');
    Route::get('news/letter/delete/{id}', 'NewsController@deleteNewsLetter')->name('news.letter.delete');

    // Events
    Route::get('event', 'EventController@allEvent')->name('all.event');
    Route::get('event/add', 'EventController@eventForm')->name('event.form');
    Route::post('event/add', 'EventController@eventSave')->name('event.save');
    Route::get('event/edit/{id}', 'EventController@editEvent')->name('event.edit');
    Route::post('event/update/{id}', 'EventController@updateEvent')->name('event.update');
    Route::get('event/delete/{id}', 'EventController@deleteEvent')->name('event.delete');

    //member

    Route::get('add/member','MemberController@addMemberForm')->name('add.member.form');
    Route::post('add/member','MemberController@addMemberSave')->name('add.member.save');


    Route::get('member/unapproved/list', 'MemberController@unapprovedMemberList')->name('unapproved.member.list');
    Route::get('member/approved/list', 'MemberController@approvedMemberList')->name('approved.member.list');
    Route::get('member/approved/{id}', 'MemberController@approvedMember')->name('approved.member');
    Route::get('member/suspend/{id}', 'MemberController@memberSuspend')->name('member.suspend');

    Route::get('member/payment/details/', 'MemberController@memberPaymentDetails')->name('member.payment.details');


    //join event
    Route::get('event/join/unapproved/list', 'MemberController@evenJoinUnapprovedList')->name('event.join.unapproved.list');

    Route::get('event/join/approved/participate/{member}/{event}/{category}', 'MemberController@evenJoinApprovedParticipate')->name('approved.event.participate');
    Route::get('event/join/approved/participate/list', 'MemberController@evenJoinApprovedParticipateList')->name('approved.event.participate.list');

    Route::post('event/join/participate/reply/mail', 'MemberController@evenParticipateReplyMail')->name('event.participate.reply.mail');
    Route::get('event/payment/details', 'MemberController@eventPaymentDetails')->name('event.payment.details');
    Route::get('event/document/details', 'MemberController@eventDocumentDetails')->name('event.document.details');
    Route::get('event/member/details', 'MemberController@eventMemberDetails')->name('event.member.details');

    //Contact

    Route::get('contact/mail/', 'ContactController@allContactMail')->name('all.contact.mail');
    Route::get('contact/mail/delete/{id}', 'ContactController@contactMailDelete')->name('contact.mail.delete');
    Route::get('contact/mail/view/{id}', 'ContactController@contactMailView')->name('contact.mail.view');
    Route::get('contact/mail/reply/{id}', 'ContactController@contactMailReply')->name('contact.mail.reply');
    Route::post('contact/mail/reply/', 'ContactController@contactMailReplySend')->name('contact.mail.reply.send');



    Route::get('yajra','NewsController@yajra');

});





Route::namespace('Frontend')->group(function () {

    //Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/','HomeController@home')->name('home');
    Route::get('about','HomeController@about')->name('about');

    Route::get('news/{id}','HomeController@news')->name('news');
    Route::get('news/details/{id}','HomeController@newsDetails')->name('news.details');
    Route::get('gallery/{id}','HomeController@gallery')->name('gallery');
    Route::get('contact','HomeController@contact')->name('contact');
    Route::post('contact','HomeController@contactMail')->name('contact.mail');

    Route::get('member-list/{id}','HomeController@member')->name('member.list');

    Route::get('event/{id}','HomeController@event')->name('event');
    Route::get('event-details/{id}','HomeController@eventDetails')->name('event.details');


});

Route::namespace('Auth')->prefix('member')->group(function () {

    Route::get('register','MemberRegisterController@registerForm')->name('member.register.form');
    Route::post('register','MemberRegisterController@register')->name('member.register');

    Route::get('login','MemberLoginController@memberLoginForm')->name('member.login.form');
    Route::post('login','MemberLoginController@memberLogin')->name('member.login');
    Route::get('logout','MemberLoginController@logout')->name('member.logout');

});
Route::namespace('Member')->middleware(['auth:member'])->prefix('member')->group(function () {

    Route::get('dashboard','MemberController@dashboard')->name('member.dashboard');
    Route::get('join','MemberController@memberJoinForm')->name('member.join');
    Route::post('join','MemberController@memberJoin')->name('member.join.submit');

    Route::get('event/technical','MemberController@eventTechnical')->name('member.technical.event');
    Route::get('event/exhibition','MemberController@eventExhibition')->name('member.exhibition.event');
    Route::get('event/field','MemberController@eventField')->name('member.field.event');

    Route::get('event/details/{id}','MemberController@eventDetails')->name('member.event.details');

    //event join technical

    Route::get('event/technical/join/{id}','MemberController@eventTechnicalJoinForm')->name('member.event.technical.join');
    Route::post('event/technical/join','MemberController@eventTechnicalJoinSubmit')->name('member.event.technical.submit');

    Route::get('event/exhibition/join/{id}','MemberController@eventExhibitionJoinForm')->name('member.event.exhibition.join');
    Route::post('event/exhibition/join','MemberController@eventExhibitionJoinSubmit')->name('member.event.exhibition.submit');

    Route::get('event/field/join/{id}','MemberController@eventFieldJoinForm')->name('member.event.field.join');
    Route::post('event/field/join','MemberController@eventFieldJoinSubmit')->name('member.event.field.submit');



});
