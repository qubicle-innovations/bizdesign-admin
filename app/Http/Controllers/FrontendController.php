<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Banner;
use App\Models\Aboutus;
use App\Models\Business_Setup;
use App\Models\Business_Category;
use App\Models\Testimonials;
use App\Models\Clients;
use App\Models\EnquiryManagement;
use App\Models\ServiceCategory;
use App\Models\Service;

class FrontendController extends Controller
{
    public function index()
    {
        $Banner = Banner::get();
        $Aboutus = Aboutus::select('id', 'stitle_1', 'mtitle_1', 'description_1', 'image_1')->first();
        $Business_Setup = Business_Setup::select('id', 'stitle', 'mtitle')->first();
        $Business_Category = Business_Category::select('id', 'title', 'image', 'points_sub2')->take(3)->get();
        $Service = service::select('id', 'logo', 'title', 'description')->take(3)->get();
        $Testimonials = Testimonials::get();
        $Clients = Clients::get();
        $EnquiryManagement = EnquiryManagement::first();
        $response = ['Banner' => $Banner, 'Aboutus' => $Aboutus, 'Business_Setup' => $Business_Setup, 'Business_Category', $Business_Category, 'Service' => $Service, 'Testimonials' => $Testimonials, 'Clients' => $Clients, 'EnquiryManagement' => $EnquiryManagement];
        return response()->json(['response' => $response, 'success' => true], JsonResponse::HTTP_OK);
    }

    public function serviceDisplay()
    {
        $ServiceCategory = ServiceCategory::select('id', 'name')->get();
        $Service = service::get();
        $Business_Category = Business_Category::get();

        $response = ['ServiceCategory' => $ServiceCategory, 'Service' => $Service,'Business_Category'=>$Business_Category];
        return response()->json(['response' => $response, 'success' => true], JsonResponse::HTTP_OK);

    }
}
