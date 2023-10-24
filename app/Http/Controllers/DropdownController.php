<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class DropdownController extends Controller
{
    public function display_data(){

        $countries = Country::all();
        $states = State::all();
        $cities = City::all();

        return view('Dropdown-country', compact('countries'));
    }

    public function getstate(Request $request){
        $cid=$request->post('cid');
       $states=State::where('country_id',$cid)->get();
        $html='<option value="">Select State</option>';
        foreach($states as $state){
            $html.='<option value="'.$state->id.'">'.$state->state_name.'</option>';
        }
        echo $html;

    }
    public function getcity(Request $request){
        $sid=$request->post('sid');
        $cities=City::where('state_id',$sid)->get();
        $html='<option value="">Select City</option>';
        foreach($cities as $city){
            $html.='<option value="'.$city->id.'">'.$city->city_name.'</option>';
        }
        echo $html;
    }

}
