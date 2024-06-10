<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\AboutusController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ExpertiseController;
use App\Http\Controllers\Admin\DifferenceController;
use App\Http\Controllers\Admin\ClientsController;
use App\Http\Controllers\Admin\TestimonialsController;
use App\Http\Controllers\Admin\BusinessController;
use App\Http\Controllers\Admin\EnquiryManagementController;
use App\Http\Controllers\Admin\SocialMediaController;

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('profile-settings', [ProfileController::class, 'index']);
        Route::post('update_password', [ProfileController::class, 'update_password']);


        Route::get('aboutus', [AboutusController::class, 'index']);
        Route::get('aboutus/create', [AboutusController::class, 'create']);
        Route::post('aboutus/create', [AboutusController::class, 'store']);
        Route::get('aboutus/update/{id}', [AboutusController::class, 'edit']);
        Route::post('aboutus/update/{id}', [AboutusController::class, 'update']);


        Route::get('banner', [BannerController::class, 'index']);
        Route::get('banner/create', [BannerController::class, 'create']);
        Route::post('banner/create', [BannerController::class, 'store']);
        Route::get('banner/update/{id}', [BannerController::class, 'edit']);
        Route::post('banner/update/{id}', [BannerController::class, 'update']);
        Route::delete('banner/delete/{id}', [BannerController::class, 'destroy']);


        Route::get('services', [ServiceController::class, 'index']);
        Route::get('services/create', [ServiceController::class, 'create']);
        Route::post('services/create', [ServiceController::class, 'store']);
        Route::get('services/update/{id}', [ServiceController::class, 'edit']);
        Route::post('services/update/{id}', [ServiceController::class, 'update']);
        Route::delete('services/delete/{id}', [ServiceController::class, 'destroy']);
        Route::get('services/view/{id}', [ServiceController::class, 'view']);


        Route::get('expertise', [ExpertiseController::class, 'index']);
        Route::get('expertise/create', [ExpertiseController::class, 'create']);
        Route::post('expertise/create', [ExpertiseController::class, 'store']);
        Route::get('expertise/update/{id}', [ExpertiseController::class, 'edit']);
        Route::post('expertise/update/{id}', [ExpertiseController::class, 'update']);
        Route::delete('expertise/delete/{id}', [ExpertiseController::class, 'destroy']);
        Route::get('expertise/view/{id}', [ExpertiseController::class, 'view']);


        Route::get('difference', [DifferenceController::class, 'index']);
        Route::get('difference/create', [DifferenceController::class, 'create']);
        Route::post('difference/create', [DifferenceController::class, 'store']);
        Route::get('difference/update/{id}', [DifferenceController::class, 'edit']);
        Route::post('difference/update/{id}', [DifferenceController::class, 'update']);
        Route::delete('difference/delete/{id}', [DifferenceController::class, 'destroy']);
        Route::get('difference/view/{id}', [DifferenceController::class, 'view']);


        Route::get('clients', [ClientsController::class, 'index']);
        Route::get('clients/create', [ClientsController::class, 'create']);
        Route::post('clients/create', [ClientsController::class, 'store']);
        Route::get('clients/update/{id}', [ClientsController::class, 'edit']);
        Route::post('clients/update/{id}', [ClientsController::class, 'update']);
        Route::delete('clients/delete/{id}', [ClientsController::class, 'destroy']);
        Route::get('clients/view/{id}', [ClientsController::class, 'view']);


        Route::get('testimonials', [TestimonialsController::class, 'index']);
        Route::get('testimonials/create', [TestimonialsController::class, 'create']);
        Route::post('testimonials/create', [TestimonialsController::class, 'store']);
        Route::get('testimonials/update/{id}', [TestimonialsController::class, 'edit']);
        Route::post('testimonials/update/{id}', [TestimonialsController::class, 'update']);
        Route::delete('testimonials/delete/{id}', [TestimonialsController::class, 'destroy']);
        Route::get('testimonials/view/{id}', [TestimonialsController::class, 'view']);


        Route::get('business', [BusinessController::class, 'index']);
        Route::get('business/create', [BusinessController::class, 'create']);
        Route::post('business/create', [BusinessController::class, 'store']);
        Route::get('business/update/{id}', [BusinessController::class, 'edit']);
        Route::post('business/update/{id}', [BusinessController::class, 'update']);
        Route::delete('business/delete/{id}', [BusinessController::class, 'destroy']);
        Route::get('business/view/{id}', [BusinessController::class, 'view']);


        Route::get('business/category', [BusinessController::class, 'list_category']);
        Route::get('business/category/create', [BusinessController::class, 'create_category']);
        Route::post('business/category/create', [BusinessController::class, 'store_category']);
        Route::get('business/category/update/{id}', [BusinessController::class, 'edit_category']);
        Route::post('business/category/update/{id}', [BusinessController::class, 'update_category']);
        Route::get('business/category/section3/{id}', [BusinessController::class, 'form_section3']);
        Route::post('business/category/section3/{id}', [BusinessController::class, 'update_section3']);
        Route::delete('business/category/delete/{id}', [BusinessController::class, 'destroy']);
        Route::get('business/category/view/{id}', [BusinessController::class, 'view_category']);


        Route::get('enquiry', [EnquiryManagementController::class, 'index']);
        Route::get('enquiry/create', [EnquiryManagementController::class, 'create']);
        Route::post('enquiry/create', [EnquiryManagementController::class, 'store']);
        Route::get('enquiry/update/{id}', [EnquiryManagementController::class, 'edit']);
        Route::post('enquiry/update/{id}', [EnquiryManagementController::class, 'update']);
        Route::delete('enquiry/delete/{id}', [EnquiryManagementController::class, 'destroy']);
        Route::get('enquiry/view/{id}', [EnquiryManagementController::class, 'view']);


        Route::get('socialmedia', [SocialMediaController::class, 'index']);
        Route::get('socialmedia/create', [SocialMediaController::class, 'create']);
        Route::post('socialmedia/create', [SocialMediaController::class, 'store']);
        Route::get('socialmedia/update/{id}', [SocialMediaController::class, 'edit']);
        Route::post('socialmedia/update/{id}', [SocialMediaController::class, 'update']);
        Route::delete('socialmedia/delete/{id}', [SocialMediaController::class, 'destroy']);
        Route::get('socialmedia/view/{id}', [SocialMediaController::class, 'view']);

        

        Route::get('service/details', [ServiceController::class, 'index']);
        Route::get('service/details/create', [ServiceController::class, 'create']);
        Route::post('service/details/create', [ServiceController::class, 'store']);
        Route::get('service/details/update/{id}', [ServiceController::class, 'edit']);
        Route::post('service/details/update/{id}', [ServiceController::class, 'update']);
        Route::get('service/view/{id}', [ServiceController::class, 'view']);


        Route::get('service/category', [ServiceController::class, 'list_category']);
        Route::get('service/category/create', [ServiceController::class, 'create_category']);
        Route::post('service/category/create', [ServiceController::class, 'store_category']);
        Route::get('service/category/update/{id}', [ServiceController::class, 'edit_category']);
        Route::post('service/category/update/{id}', [ServiceController::class, 'update_category']);
        Route::delete('service/category/delete/{id}', [ServiceController::class, 'destroy_categor']);


        Route::get('service', [ServiceController::class, 'list_service']);
        Route::get('service/create', [ServiceController::class, 'create_service']);
        Route::post('service/create', [ServiceController::class, 'store_service']);
        Route::get('service/update/{id}', [ServiceController::class, 'edit_service']);
        Route::post('service/update/{id}', [ServiceController::class, 'update_service']);
        Route::get('service/section3/{id}', [ServiceController::class, 'form_section3']);
        Route::post('service/section3/{id}', [ServiceController::class, 'update_section3']);
        Route::delete('service/delete/{id}', [ServiceController::class, 'destroy_service']);
    });
});