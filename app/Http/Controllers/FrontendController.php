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
use App\Models\Expertise;
use App\Models\Difference;
use App\Models\serviceData;
use App\Models\BusinessData;
use App\Models\BankingEnquiry;
use Illuminate\Support\Facades\Validator;

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
        $response = ['Banner' => $Banner, 'Aboutus' => $Aboutus, 'Business_Setup' => $Business_Setup, 'Business_Category'=> $Business_Category, 'Service' => $Service, 'Testimonials' => $Testimonials, 'Clients' => $Clients, 'EnquiryManagement' => $EnquiryManagement];
        return response()->json(['response' => $response, 'success' => true], JsonResponse::HTTP_OK);
    }

    public function serviceDisplay()
    {
        $ServiceCategory = ServiceCategory::select('id', 'name')->get();
        $Service = Service::where('type', 'new')->get();
        $Business_Category = Business_Category::get();

        $response = ['ServiceCategory' => $ServiceCategory, 'Service' => $Service, 'Business_Category' => $Business_Category];
        return response()->json(['response' => $response, 'success' => true], JsonResponse::HTTP_OK);

    }


    public function serviceDetails($id)
    {
        $Service = Service::with('section1', 'section2')->where('type', 'new')->find($id);

        $response = ['Service' => $Service];
        return response()->json(['response' => $response, 'success' => true], JsonResponse::HTTP_OK);

    }

      public function businessDetails($id)
    {
        $Business = Business_Category::with('section1', 'section2')->find($id);

        $response = ['Business' => $Business];
        return response()->json(['response' => $response, 'success' => true], JsonResponse::HTTP_OK);

    }


    public function aboutus()
    {
        $Aboutus = Aboutus::first();
        $Clients = Clients::get(); 
        $response = ['Aboutus' => $Aboutus, 'Clients' => $Clients];
        return response()->json(['response' => $response, 'success' => true], JsonResponse::HTTP_OK);
    }

    public function expertise()
    {
        $Expertise = Expertise::with('section1', 'section2')->first();
        return response()->json(['response' => $Expertise, 'success' => true], JsonResponse::HTTP_OK);
    }
    
    public function difference()
    {
        $Difference = Difference::first();
        return response()->json(['response' => $Difference, 'success' => true], JsonResponse::HTTP_OK);
    }
    public function service_data($id)
    {
        $Service = serviceData::find($id);
        $response = ['Service' => $Service];
        return response()->json(['response' => $response, 'success' => true], JsonResponse::HTTP_OK);
    }
    public function business_data($id)
    {
        $BusinessData = BusinessData::find($id);
        $response = ['BusinessData' => $BusinessData];
        return response()->json(['response' => $response, 'success' => true], JsonResponse::HTTP_OK);
    }

    public function banking_enquiry(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'client_name' => 'required',
                'client_email' => 'required',
                'client_phone' => 'required',
            ]
        );

        if ($validator->fails()) {            
            return response()->json(['response' => $validator, 'success' => false], JsonResponse::HTTP_BAD_REQUEST);
        }
        $BankingEnquiry = new BankingEnquiry();
        
        $BankingEnquiry->existing_business = $request->existing_business;
        $BankingEnquiry->company_name = $request->company_name;
        $BankingEnquiry->registered_in = $request->registered_in;
        $BankingEnquiry->residence_visa = $request->residence_visa;
        $BankingEnquiry->business_office = $request->business_office;
        $BankingEnquiry->bank_statement = $request->bank_statement;
        $BankingEnquiry->engaged_activities = $request->engaged_activities;
        $BankingEnquiry->proof_address = $request->proof_address;
        $BankingEnquiry->work_countries = $request->work_countries;
        $BankingEnquiry->biz_client = $request->biz_client;
        $BankingEnquiry->currencies_required = $request->currencies_required;
        $BankingEnquiry->client_name = $request->client_name;
        $BankingEnquiry->client_nationality = $request->client_nationality;
        $BankingEnquiry->client_comments = $request->client_comments;
        $BankingEnquiry->client_phone = $request->client_phone;
        $BankingEnquiry->client_email = $request->client_email;
        $BankingEnquiry->save();        
        return response()->json(['response' => "Submitted successfuly", 'success' => true], JsonResponse::HTTP_OK);
        															
    }
}
