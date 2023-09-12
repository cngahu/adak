@extends('applicant.applicant_dashboard')
@section('applicant')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="row">


        <div class="col-lg-8 col-xl-12">
            <h5 style="color:seagreen">Step 5 of 7</h5>
            <div class="card">
                <div class="card-body">





                    <!-- end timeline content-->

                    <div class="tab-pane">
                        <form method="post" id="myForm" action="{{ route('experience.store') }}" enctype="multipart/form-data">                                    @csrf
@csrf
                            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Add Work Experience</h5>

                            <div class="row">


                                <div class="col-md-6">
                                    <div class="mb-3 form-group">
                                        <label for="company" class="form-label">Name of Company/Organization</label>
                                        <input type="text" name="company" id="company" class="form-control"  placeholder="Name of Organization"  >

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3 form-group">
                                        <label for="jobTitle" class="form-label">Job Title</label>
                                        <input type="text" name="jobTitle" id="jobTitle" class="form-control"  placeholder="Job Title"  >

                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="mb-3 form-group">
                                        <label for="Duties" class="form-label">Duties/Responsibilities</label>
                                        <textarea class="form-control" id="Duties" name="Duties" rows="5"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3 form-group">
                                        <label for="startDate" class="form-label">Start date   </label>
                                        <input  type="date" id="date_picker" name="startDate" value="" class="form-control"  placeholder="Start Date" />

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="city" class="form-label"style="font-size:large">Is this your current job?</label>
                                    <div class="form-group">
                                        <select name="current" id="current" required="" class="form-control">
                                            <option value="" selected="" disabled="">Select Status</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>

                                        </select>
                                    </div>
                                </div>
                              <div class="row" style="display: none" id="currentjob">
                                  <div class="col-md-6">
                                      <div class="mb-3 form-group">
                                          <label for="firstname" class="form-label">Exit date   </label>
                                          <input  type="date" id="date_picker" name="exitDate" value="" class="form-control"  placeholder="Exit Date" />

                                      </div>
                                  </div>


                                  <div class="col-md-6">
                                      <div class="mb-3 form-group">
                                          <label for="firstname" class="form-label">Exit Reasons   </label>
                                          <input type="text" name="exitReasons" id="exitReasons" class="form-control " placeholder="Exit Reasons Name"  >

                                      </div>
                                  </div>
                              </div>










                            </div> <!-- end row -->


                        @if(count($experience)==0)


                            <div class="text-end">
                                <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                            </div>
                            @else
                                <div class="text-end">

                                    <a href="{{route('applicant.profile',$userid)}}" class="btn btn-primary">Previous</a>
                                    <button type="submit"  class="btn btn-success "> Save And Add Another</button>
                                    <a href="{{route('applicant.proffessionalqual')}}" class="btn btn-warning">Proceed To Next Stage</a>

                                </div>

                            @endif
                        </form>
                    </div>
                    <!-- end settings content-->


                </div>
            </div> <!-- end card-->

        </div> <!-- end col -->
    </div>

    <div class="row">
        <div class="col-12">
            <!-- Portlet card -->
            <div class="card">
                <div class="card-body">
                    <div class="card-widgets">
                        <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                        <a data-bs-toggle="collapse" href="#cardCollpase4" role="button" aria-expanded="false" aria-controls="cardCollpase4"><i class="mdi mdi-minus"></i></a>
                    </div>
                    <h4 class="header-title mb-0">My Academic Qualifications</h4>

                    <div id="cardCollpase4" class="collapse show">
                        <div class="table-responsive pt-3">
                            <table class="table table-centered table-nowrap table-borderless mb-0">
                                <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Company</th>
                                    <th>Job Title</th>
                                    <th>Duties</th>
                                    <th>Start Date</th>
                                    <th>Exit Reasons</th>

                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($experience as $key=> $item)
                                <tr class=".table-striped">
                                    <td> {{ $key+1 }} </td>
                                    <td>{{$item->company}}</td>
                                    <td>{{$item->jobTitle}}</td>
                                    <td>{{$item->Duties}}</td>
                                    <td>{{$item->startDate}}</td>
                                    <td>{{$item->exitReasons}}</td>

                                    <td>
                                        <a href="{{route('education.edit',$item->id)}}" class="btn btn-primary"><i class="material-symbols-outlined">edit</i></a>
                                        <a href="{{route('education.delete',$item->id)}}" class="btn btn-danger"  id="delete" ><i class="material-symbols-outlined">delete</i></a>

                                    </td>


                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div> <!-- .table-responsive -->
                    </div> <!-- end collapse-->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>


    <script>
        $(function () {

            $('#current').on('change', function() {

                if ( this.value == "No" )
                {
                    $("#currentjob").show();


                }
                else
                {
                    $("#currentjob").hide();


                }


            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function (){
            $('#myForm').validate({
                rules: {
                    company: {
                        required : true,
                    },
                    jobTitle: {
                        required : true,
                    },
                    Duties: {
                        required : true,
                    },
                    startDate: {
                        required : true,
                    },


                    current: {
                        required : true,
                    },



                    exitDate: {
                        required : function(element){
                            return Number(($('#current').val()=="No"));
                        },
                    },
                    exitReasons: {
                        required : function(element){
                            return Number(($('#current').val()=="No"));
                        },
                    },


                },
                messages :{
                    company: {
                        required : 'Institution Name Required',
                    },
                    jobTitle: {
                        required : 'Job Title Required',
                    },
                    startDate: {
                        required : 'Start Date Required',
                    },
                    exitDate: {
                        required : 'Exit Date Required',
                    },
                    Duties: {
                        required : 'Duties Required',
                    },
                    exitReasons: {
                        required : 'Exit Reasons Required',
                    },
                    current: {
                        required : 'This Option is Required',
                    },



                },
                errorElement : 'span',
                errorPlacement: function (error,element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight : function(element, errorClass, validClass){
                    $(element).addClass('is-invalid');
                },
                unhighlight : function(element, errorClass, validClass){
                    $(element).removeClass('is-invalid');
                },
            });
        });

    </script>
@endsection
