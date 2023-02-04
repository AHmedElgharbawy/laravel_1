<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OffersController extends Controller
{

    public function __construct()
    {
    }
    public function getFillable()
    {
        return Offer::get();
    }
    public function create(){
        return view("offer.addOffer");
    }
    public function store(OfferRequest $request){
//        $rules = $this->getRules();
//        $messages = $this->getMessages();
//
//        $validator = Validator::make($request->all(),$rules,$messages);
//        if($validator->fails()){
//            return redirect()->back()->withErrors($validator)->withInput($request->all());
//        }
        Offer::create([
            "name" => $request -> name,
            "price" => $request -> price,
            "description" => $request -> description,
        ]);
        return redirect()->back()->with(["success"=>"offer added successfully"]);

    }
//    protected function getRules(){
//
//    }
//    protected function getMessages(){
//
//    }

    public function allOffers(){
        $offers = Offer::select("id","name","price","description")->get();
        return view("allOffers",compact("offers"));

    }

}
