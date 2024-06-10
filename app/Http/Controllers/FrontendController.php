<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Banner;
use App\Models\Aboutus;
use App\Models\Testimonials;
use App\Models\Clients;
use App\Models\EnquiryManagement;

class FrontendController extends Controller
{
    public function index()
    {
        $Banner = Banner::get();
        $Aboutus = Aboutus::select('id', 'stitle_1', 'mtitle_1', 'description_1', 'image_1')->get();
        $Testimonials = Testimonials::get();
        $Clients = Clients::get();
        $EnquiryManagement = EnquiryManagement::get();
        $response = ['Banner' => $Banner, 'Aboutus' => $Aboutus, 'Testimonials' => $Testimonials, 'Clients' => $Clients, 'EnquiryManagement' => $EnquiryManagement];
        return response()->json(['response' => $response, 'success' => true], JsonResponse::HTTP_OK);
    }
}
