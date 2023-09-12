<?php

namespace App\Http\Controllers\Recruitment;

use App\Http\Controllers\Controller;
use App\Models\Grades;
use App\Models\ProffessionalQual;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProffessionalQualificationsController extends Controller
{
    //
    public function ProffessionalQualProfile(){
        $userid=Auth::user()->id;
        $proff_qual=ProffessionalQual::where('userid',$userid)->get()->all();
        $grade=Grades::get()->all();

        return view('applicant.apply.proffqual_all',compact('userid','proff_qual','grade'));
    }

    public function ProffessionalQualStore(Request $request){

        $proffqualid= ProffessionalQual::insertGetId([

            'userid' => Auth::user()->id,
            'startDate' => $request->startDate,
            'exitDate' => $request->exitDate,
            'institutionName' => $request->institutionName,
            'courseName' => $request->courseName,
            'grade' => $request->grade,
            'certificate' => "",
            'entryDate' => Carbon::now(),
            'created_at'=>Carbon::now(),
        ]);

        //Synopsis
        if($request->certificate != null) {
            $certificate ='PQ-'. $proffqualid. '.' . $request->certificate->extension();
            $request->certificate->move(public_path('upload/proffqual/'), $certificate);
            $certificate_url = 'upload/proffqual/' . $certificate;
        }
        else{
            $certificate_url=null;
        }
        $proffqual=ProffessionalQual::findOrFail($proffqualid);
        $proffqual->certificate=$certificate_url;
        $proffqual->save();
        $this->UpdateLevel(Auth::user()->id);
        $notification = array(
            'message' => 'Proffessional Qualification Saved Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('applicant.proffessionalqual')->with($notification);

    }

    public function ProffessionalQualEdit($id){
        $proffqual = ProffessionalQual::findOrFail($id);
        return view('applicant.apply.proffqual_edit',compact('proffqual'));
    }// End Method

    public function ProffessionalQualUpdate(Request $request){

        $proffqual_id = $request->id;
        $old_cert = $request->oldcert;

        if ($request->file('certificate')) {

            if (file_exists($old_cert)) {
                unlink($old_cert);
            }
            $certificate ='PQ-'. $proffqual_id . '.' . $request->certificate->extension();
            $request->certificate->move(public_path('upload/proffqual/'), $certificate);
            $certificate_url = 'upload/proffqual/' . $certificate;



            ProffessionalQual::findOrFail($proffqual_id)->update([

                'startDate' => $request->startDate,
                'exitDate' => $request->exitDate,
                'institutionName' => $request->institutionName,
                'courseName' => $request->courseName,
                'grade' => $request->grade,
                'certificate' => $certificate_url,
                'updated_at'=>Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Proffessional Qualification Updated with Certificate Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('applicant.proffessionalqual')->with($notification);

        } else {

            ProffessionalQual::findOrFail($proffqual_id)->update([

                'startDate' => $request->startDate,
                'exitDate' => $request->exitDate,
                'institutionName' => $request->institutionName,
                'courseName' => $request->courseName,
                'grade' => $request->grade,

                'updated_at'=>Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Proffessional Qualification Updated  Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('applicant.proffessionalqual')->with($notification);

        } // end else

    }// End Method

    public function ProffessionalQualDelete($id){

        $proffqual = ProffessionalQual::findOrFail($id);
        $cert = $proffqual->certificate;
        unlink($cert );

        ProffessionalQual::findOrFail($id)->delete();
        $this->DowngradeLevel($proffqual->userid);
        $notification = array(
            'message' => 'Proffessional Qualification Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Method

    private function UpdateLevel($id)
    {
        $user=User::findOrFail($id);
        if($user->level==3)
        {
            $user->level=4;
        }
        $user->Save();
    }

    private function DowngradeLevel($id)
    {
        if(ProffessionalQual::where('userid',$id)->count()==0)
        {
            $user=User::findOrFail($id);

            $user->level=3;

            $user->Save();
        }

    }
}
