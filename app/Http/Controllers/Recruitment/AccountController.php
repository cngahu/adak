<?php

namespace App\Http\Controllers\Recruitment;

use App\Http\Controllers\Controller;

use App\Models\constituency;
use App\Models\Designations;
use App\Models\ethnicity;
use App\Models\gender;
use App\Models\home_county;
use App\Models\marital_status;
use App\Models\nationality;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AccountController extends Controller
{
    //
    public function Register(){
        $user=User::where('id', Auth::user()->id)->first();
        $designation=Designations::get()->all();
        $gender=gender::get()->all();
        $nationality=nationality::get()->all();
        $ethnicity=ethnicity::get()->all();
        $county=home_county::get()->all();
        $constituency=constituency::get()->all();
        $marital=marital_status::get()->all();
//
//        if($user->level==1)
//        {
//
//        }
//        else
//        {
//            return view('applicant.apply.applicant_profile',compact('user','nationality','ethnicity','constituency','county','marital','designation','gender'));
//
//        }
        return view('applicant.apply.account',compact('user','nationality','ethnicity','constituency','county','marital','designation','gender'));

    }

    public function RegisterUpdate(Request $request){

        if ($request->file('reg_certificate')) {


            $certificate = $request->userid . '.' . $request->reg_certificate->extension();
            $request->reg_certificate->move(public_path('upload/disability/'), $certificate);
            $certificate_url = 'upload/disability/' . $certificate;
        }
        else{
            $certificate_url ="";
        }


        User::findOrFail($request->userid)->update([

            'idnumber' => $request->idnumber,
//            'kra' => $request->kra,
            'gender' => $request->gender,
            'title' => $request->title,
             'dob' => $request->dob,
            'nationality' => 115,
            'ethnicity' => $request->ethnicity,
            'county' => $request->county,
//            'constituency' =>$request->constituency,
            'postal_address' => $request->postal_address,
            'postal_code' => $request->postal_code,
            'city' => $request->city,
            'phone' =>$request->phone,
            'marital' => $request->marital,
            'disability' =>$request->disability,
            'disabilitydescription' => $request->disabilitydescription,
            'disability_cert'=>$certificate_url,
            'level' => 2,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'User Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('applicant.alleducation')->with($notification);
    }

    public function Profile($id){
        $user=User::findOrFail($id);
        $designation=Designations::get()->all();
        $gender=gender::get()->all();
        $nationality=nationality::get()->all();
        $ethnicity=ethnicity::get()->all();
        $county=home_county::get()->all();
        $constituency=constituency::get()->all();
        $marital=marital_status::get()->all();
        return view('applicant.apply.applicant_profile',compact('user','nationality','ethnicity','constituency','county','marital','designation','gender'));
    }

    public function ProfileUpdate(Request $request){

//        if ($request->file('reg_certificate')) {
//
//
//            $certificate = $request->userid . '.' . $request->reg_certificate->extension();
//            $request->reg_certificate->move(public_path('upload/disability/'), $certificate);
//            $certificate_url = 'upload/disability/' . $certificate;
//        }
//        else{
//            $certificate_url ="";
//        }


        User::findOrFail($request->userid)->update([

            'idnumber' => $request->idnumber,
            'gender' => $request->gender,
            'title' => $request->title,
            'dob' => $request->dob,

            'ethnicity' => $request->ethnicity,
            'county' => $request->county,

            'postal_address' => $request->postal_address,
            'postal_code' => $request->postal_code,
            'city' => $request->city,
            'phone' =>$request->phone,
            'marital' => $request->marital,
            'disability' =>$request->disability,
//            'disabilitydescription' => $request->disabilitydescription,
//            'disability_cert'=>$certificate_url,

            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'User Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('applicant.profile',$request->userid)->with($notification);
    }
}
