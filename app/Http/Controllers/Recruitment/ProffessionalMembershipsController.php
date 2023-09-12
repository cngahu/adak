<?php

namespace App\Http\Controllers\Recruitment;

use App\Http\Controllers\Controller;
use App\Models\ProffessionalMembership;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProffessionalMembershipsController extends Controller
{
    //
    public function ProffessionalMembershipProfile(){
        $userid=Auth::user()->id;
        $proff_memb=ProffessionalMembership::where('userid',$userid)->get()->all();


        return view('applicant.apply.proffmemb_all',compact('userid','proff_memb'));
    }

    public function ProffessionalMembershipStore(Request $request){

        $proffmembid= ProffessionalMembership::insertGetId([

            'userid' => Auth::user()->id,
            'proffBody' => $request->proffBody,
            'memberNumber' => $request->memberNumber,
            'memberCertificate' => "",
            'created_at'=>Carbon::now(),
        ]);

        //Synopsis
        if($request->memberCertificate != null) {
            $certificate ='PM-'. $proffmembid. '.' . $request->memberCertificate->extension();
            $request->memberCertificate->move(public_path('upload/proffmemb/'), $certificate);
            $certificate_url = 'upload/proffmemb/' . $certificate;
        }
        else{
            $certificate_url=null;
        }
        $proffmemb=ProffessionalMembership::findOrFail($proffmembid);
        $proffmemb->memberCertificate=$certificate_url;
        $proffmemb->save();
        $this->UpdateLevel(Auth::user()->id);
        $notification = array(
            'message' => 'Proffessional Membership Saved Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('applicant.proffmembership')->with($notification);

    }

    public function ProffessionalMembershipEdit($id){
        $proffmemb = ProffessionalMembership::findOrFail($id);
        return view('applicant.apply.proffmemb_edit',compact('proffmemb'));
    }// End Method

    public function ProffessionalMembershipUpdate(Request $request){

        $proffmemb_id = $request->id;
        $old_cert = $request->oldcert;

        if ($request->file('memberCertificate')) {

            if (file_exists($old_cert)) {
                unlink($old_cert);
            }
            $certificate ='PM-'. $proffmemb_id. '.' . $request->memberCertificate->extension();
            $request->memberCertificate->move(public_path('upload/proffmemb/'), $certificate);
            $certificate_url = 'upload/proffmemb/' . $certificate;



            ProffessionalMembership::findOrFail($proffmemb_id)->update([

                'proffBody' => $request->proffBody,
                'memberNumber' => $request->memberNumber,
                'memberCertificate' =>  $certificate_url,
                'updated_at'=>Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Proffessional Membership Updated with Certificate Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('applicant.proffmembership')->with($notification);

        } else {

            ProffessionalMembership::findOrFail($proffmemb_id)->update([
                'proffBody' => $request->proffBody,
                'memberNumber' => $request->memberNumber,
                'updated_at'=>Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Proffessional Membership Updated  Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('applicant.proffmembership')->with($notification);

        } // end else

    }// End Method

    public function ProffessionalMembershipDelete($id){

        $proffmemb = ProffessionalMembership::findOrFail($id);
        $cert = $proffmemb->memberCertificate;
        unlink($cert );

        ProffessionalMembership::findOrFail($id)->delete();
        $this->DowngradeLevel($proffmemb->userid);
        $notification = array(
            'message' => 'Proffessional Membership Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Method

    private function UpdateLevel($id)
    {
        $user=User::findOrFail($id);
        if($user->level==4)
        {
            $user->level=5;
        }
        $user->Save();
    }

    private function DowngradeLevel($id)
    {
        if(ProffessionalMembership::where('userid',$id)->count()==0)
        {
            $user=User::findOrFail($id);

            $user->level=4;

            $user->Save();
        }

    }
}
