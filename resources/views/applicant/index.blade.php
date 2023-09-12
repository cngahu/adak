@extends('applicant.applicant_dashboard')
@section('applicant')

    @php

    $user=\App\Models\User::where('id',\Illuminate\Support\Facades\Auth::user()->id)->first();
    @endphp
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">

                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
    @if($user->level==1)
        <div class="row">
            <h1>Dear {{$user->first_name}}, kindly complete your profile by clicking <a href="{{route('applicant.register')}}">here</a> </h1>
        </div>
    @elseif($user->level==2)
        <div class="row">
            <h1>Dear {{$user->first_name}}, kindly complete your profile by clicking <a href="{{route('applicant.alleducation')}}">here</a> </h1>
        </div>
    @elseif($user->level==3)
        <div class="row">
            <h1>Dear {{$user->first_name}}, kindly complete your profile by clicking <a href="{{route('applicant.proffessionalqual')}}">here</a> </h1>
        </div>
    @elseif($user->level==4)
        <div class="row">
            <h1>Dear {{$user->first_name}}, kindly complete your profile by clicking <a href="{{route('applicant.proffmembership')}}">here</a> </h1>
        </div>
    @elseif($user->level==5)
        <div class="row">
            <h1>Dear {{$user->first_name}}, kindly complete your profile by clicking <a href="{{route('applicant.experience')}}">here</a> </h1>
        </div>
    @else
        <div class="row">
        </div>
    <div class="row">


        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title mb-3"> Profile Creation</h4>
                    <div id="rootwizard">
                        <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-3" role="tablist">
                            <li class="nav-item" data-target-form="#accountForm" role="presentation">
                                <a href="#first" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2 active" aria-selected="true" role="tab">
                                    <i class="mdi mdi-account-circle me-1"></i>
                                    <span class="d-none d-sm-inline">Account</span>
                                </a>
                            </li>
                            <li class="nav-item" data-target-form="#profileForm" role="presentation">
                                <a href="#second" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2" aria-selected="false" role="tab" tabindex="-1">
                                    <i class="mdi mdi-face-profile me-1"></i>
                                    <span class="d-none d-sm-inline">Profile</span>
                                </a>
                            </li>

                            <li class="nav-item" data-target-form="#otherForm" role="presentation">
                                <a href="#third" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2" aria-selected="false" tabindex="-1" role="tab">
                                    <i class="mdi mdi-checkbox-marked-circle-outline me-1"></i>
                                    <span class="d-none d-sm-inline">Finish</span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content mb-0 b-0 pt-0">

                            <div class="tab-pane active" id="first" role="tabpanel">
                                <form id="accountForm" method="post" action="#" class="form-horizontal">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row mb-3">
                                                <label class="col-md-3 col-form-label" for="userName3">User name</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="userName3" name="userName3" required="">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-md-3 col-form-label" for="password3"> Password</label>
                                                <div class="col-md-9">
                                                    <input type="password" id="password3" name="password3" class="form-control" required="">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label class="col-md-3 col-form-label" for="confirm3">Re Password</label>
                                                <div class="col-md-9">
                                                    <input type="password" id="confirm3" name="confirm3" class="form-control" required="">
                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->
                                </form>
                            </div>

                            <div class="tab-pane fade" id="second" role="tabpanel">
                                <form id="profileForm" method="post" action="#" class="form-horizontal was-validated">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row mb-3">
                                                <label class="col-md-3 col-form-label" for="name3"> First name</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="name3" name="name3" class="form-control" required="">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-md-3 col-form-label" for="surname3"> Last name</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="surname3" name="surname3" class="form-control" required="">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label class="col-md-3 col-form-label" for="email3">Email</label>
                                                <div class="col-md-9">
                                                    <input type="email" id="email3" name="email3" class="form-control" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                </form>
                            </div>

                            <div class="tab-pane fade" id="third" role="tabpanel">
                                <form id="otherForm" method="post" action="#" class="form-horizontal">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="text-center">
                                                <h2 class="mt-0">
                                                    <i class="mdi mdi-check-all"></i>
                                                </h2>
                                                <h3 class="mt-0">Thank you !</h3>

                                                <p class="w-75 mb-2 mx-auto">Quisque nec turpis at urna dictum luctus. Suspendisse convallis dignissim eros at volutpat. In egestas mattis
                                                    dui. Aliquam mattis dictum aliquet.</p>

                                                <div class="mb-3">
                                                    <div class="form-check d-inline-block">
                                                        <input type="checkbox" class="form-check-input" id="customCheck4" required="">
                                                        <label class="form-check-label" for="customCheck4">I agree with the Terms and Conditions</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                </form>
                            </div>

                            <ul class="list-inline wizard mb-0">
                                <li class="previous list-inline-item disabled"><a href="javascript: void(0);" class="btn btn-secondary">Previous</a>
                                </li>
                                <li class="next list-inline-item float-end"><a href="javascript: void(0);" class="btn btn-secondary">Next</a></li>
                            </ul>

                        </div> <!-- tab-content -->
                    </div> <!-- end #rootwizard-->

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
</div>

        <!-- end row-->
    @endif


    </div> <!-- container -->

</div>

@endsection
