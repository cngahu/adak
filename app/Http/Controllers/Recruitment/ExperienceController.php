<?php

namespace App\Http\Controllers\Recruitment;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExperienceController extends Controller
{
    //
    public function ExperienceProfile(){
        $userid=Auth::user()->id;
        $experience=Experience::where('userid',$userid)->get()->all();

        return view('applicant.apply.experience_all',compact('userid','experience'));
    }

    public function ExperienceStore(Request $request){

        $experienceid= Experience::insertGetId([

            'userid' => Auth::user()->id,
            'company' => $request->company,
            'jobTitle' => $request->jobTitle,
            'Duties' => $request->Duties,
            'startDate' => $request->startDate,
            'isCurrent' => $request->current=="Yes" ? 1 :0,
            'exitDate' => $request->current=="No" ? $request->exitDate :null,
            'exitReasons' => $request->current=="No" ? $request->exitReasons :"",
            'created_at'=>Carbon::now(),
        ]);

        $this->UpdateLevel(Auth::user()->id);
        $notification = array(
            'message' => 'Experience Saved Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('applicant.experience')->with($notification);

    }

    private function UpdateLevel($id)
    {
        $user=User::findOrFail($id);
        if($user->level==5)
        {
            $user->level=6;
        }
        $user->Save();
    }
}
