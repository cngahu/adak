@extends('applicant.applicant_dashboard')
@section('applicant')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="row">
        <h5 style="color:seagreen">Step 3 of 7</h5>

        <div class="col-lg-8 col-xl-12">
            <div class="card">
                <div class="card-body">





                    <!-- end timeline content-->

                    <div class="tab-pane">
                        <form method="post" id="myForm" action="{{ route('proffessionalqual.store') }}" enctype="multipart/form-data">                                    @csrf
@csrf
                            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Add Proffessional Qualification</h5>

                            <div class="row">


                                <div class="col-md-6">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Proffessional/Examining Body</label>
                                        <input type="text" name="institutionName" id="institutionName" class="form-control @error('institutionName') is-invalid @enderror"   >
                                        @error('institutionName')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Course Name   </label>
                                        <input type="text" name="courseName" id="courseName" class="form-control @error('courseName') is-invalid @enderror" placeholder="Course Name"  >

                                    </div>
                                </div>






                                <div class="col-md-6">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Completion Date   </label>
                                        <input  type="date" id="date_picker" name="exitDate" value="" class="form-control"  placeholder="Exit Date" />

                                    </div>
                                </div>





                                <div class="col-md-6">
                                    <div class="mb-3 form-group">
                                        <label for="grade" class="form-label">Grade Attained  </label>
                                        <input type="text" name="grade" id="grade" class="form-control @error('courseName') is-invalid @enderror" placeholder="Grade Attained"  >


                                    </div>
                                </div>





                                <div class="col-md-6">
                                    <div class="mb-3 form-group">
                                        <label for="certificate" class="form-label">Upload Certificate in PDF Format.Ensure document is less than 1mb</label>
                                        <input type="file" name="certificate" id="certificate" class="form-control"  accept="application/pdf">
                                    </div>
                                </div> <!-- end col -->




                            </div> <!-- end row -->


                        @if(count($proff_qual)==0)


                            <div class="text-end">
                                <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                            </div>
                            @else
                                <div class="text-end">

                                    <a href="{{route('applicant.alleducation')}}" class="btn btn-primary">Previous</a>
                                    <button type="submit"  class="btn btn-success "> Save And Add Another</button>
                                    <a href="{{route('applicant.proffmembership')}}" class="btn btn-warning">Proceed To Next Stage</a>

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
                    <h4 class="header-title mb-0">My Proffessional Qualifications</h4>

                    <div id="cardCollpase4" class="collapse show">
                        <div class="table-responsive pt-3">
                            <table class="table table-centered table-nowrap table-borderless mb-0">
                                <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Institution</th>
                                    <th>Course</th>

                                    <th>Completion Date</th>
                                    <th>Grade</th>
                                    <th>Certificate</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($proff_qual as $key=> $item)
                                <tr class=".table-striped">
                                    <td> {{ $key+1 }} </td>
                                    <td>{{$item->institutionName}}</td>
                                    <td>{{$item->courseName}}</td>

                                    <td>{{$item->exitDate}}</td>
                                    <td>{{$item->grade}}</td>
                                    <td><a href="{{asset($item->certificate)}}" target="_blank" >Certificate</a> </td>

                                    <td>
                                        <a href="{{route('proffessionalqual.edit',$item->id)}}" class="btn btn-primary"><i class="material-symbols-outlined">edit</i></a>
                                        <a href="{{route('proffessionalqual.delete',$item->id)}}" class="btn btn-danger"  id="delete" ><i class="material-symbols-outlined">delete</i></a>

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




    <script type="text/javascript">
        $(document).ready(function (){
            $('#myForm').validate({
                rules: {
                    institutionName: {
                        required : true,
                    },

                    startDate: {
                        required : true,
                    },
                    exitDate: {
                        required : true,
                    },
                    courseName: {
                        required : true,
                    },
                    grade: {
                        required : true,
                    },

                    certificate: {
                        required : true,
                    },



                },
                messages :{
                    institutionName: {
                        required : 'Institution Name Required',
                    },

                    startDate: {
                        required : 'Start Date Required',
                    },
                    exitDate: {
                        required : 'Start Date Required',
                    },
                    courseName: {
                        required : 'Course Name Required',
                    },
                    grade: {
                        required : 'Grade Attained Required',
                    },

                    certificate: {
                        required : 'Certificate Required',
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
