
@extends('applicant.applicant_dashboard')
@section('applicant')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <div class="row">
      <h5 style="color:seagreen">Step 1 of 7</h5>
      <h3>Personal Details</h3>
      <div class="page-content">

          <div class="card border-top border-left  border-0 border-4 border-success">
              <div class="card-body ">

                  <form class="row " id="myForm" method="post" action="{{route('applicant.store')}}"  >
                      @csrf
                      <input hidden="" name="userid" value="{{$user->id}}">


                      <div class="row">
                          <div class="col-md-3">
                              <label for="inputLastName2" class="form-label" >Applicant Name</label>
                              <div class="form-group">
                                  <input type="text" style="background-color: grey;color: whitesmoke" name="first_name" value="{{$user->first_name}}" disabled class="form-control border-start-0" />
                              </div>
                          </div>

                          <div class="col-md-3">
                              <label for="inputLastName2" class="form-label" >Applicant Other Name</label>
                              <div class="form-group">
                                  <input type="text" style="background-color: grey;color: whitesmoke"  name="other_name" value="{{$user->other_name}}" disabled class="form-control border-start-0" />
                              </div>
                          </div>
                          <div class="col-md-3">
                              <label for="inputLastName2" class="form-label" >Applicant Last Name</label>
                              <div class="form-group">
                                  <input type="text" style="background-color: grey;color: whitesmoke" name="last_name" value="{{$user->last_name}}" disabled class="form-control border-start-0" />
                              </div>
                          </div>
                          <br>
                          <div class="col-md-3">
                              <label for="inputLastName2" class="form-label"  >Email Address</label>
                              <div class="form-group">
                                  <input type="text" name="email" style="background-color: grey;color: whitesmoke"  value="{{$user->email}}" disabled class="form-control border-start-0" />
                              </div>
                          </div>

                      </div>
                      <p></p>
                      <div class="row">
                          <div class="col-md-4">
                              <label for="inputLastName2" class="form-label" style="font-size:large" >Title(Mr/Mrs/Ms ):</label>
                              <div class="form-group">
                                  <select name="title"  id="title" required="" class="form-control">
                                      <option value="" selected="" disabled="">Select </option>
                                      @foreach($designation as $item)
                                          <option value="{{$item->id }}">{{$item->name}}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <label for="inputLastName2" class="form-label" style="font-size:large">Date Of Birth</label>
                              <div class="form-group">
                                  <input type="date" id="date_picker" name="dob" value="" class="form-control"   />

                              </div>
                          </div>
                          <br>
                          <div class="col-md-4">
                              <label for="inputLastName2" class="form-label" style="font-size:large" >National ID/Passport Number:</label>
                              <div class="form-group">
                                  <input type="text" id="idnumber" name="idnumber" class="form-control border-start-0" placeholder="ID/Passport Number"/>
                              </div>
                          </div>

                      </div>
                      <p></p>

                        <p></p>
                      <div class="row">
                          <div class="col-md-4">
                              <label for="inputLastName2" class="form-label" style="font-size:large">Gender</label>
                              <div class="form-group">
                                  <select name="gender"  id="gender" required="" class="form-control">
                                      <option value="" selected="" disabled="">Select </option>
                                      @foreach($gender as $item)
                                          <option value="{{ $item->id }}">{{ $item->name }}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <label for="inputLastName2" class="form-label" style="font-size:large">Ethnicity</label>
                              <div class="form-group">
                                  <select name="ethnicity"  id="ethnicity" required="" class="form-control">
                                      <option value="" selected="" disabled="">Select </option>
                                      @foreach($ethnicity as $item)
                                          <option value="{{ $item->id }}">{{ $item->name }}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <label for="inputLastName2" class="form-label" style="font-size:large">Home County</label>
                              <div class="form-group">
                                  <select name="county"  id="county" required="" class="form-control">
                                      <option value="" selected="" disabled="">Select </option>
                                      @foreach($county as $item)
                                          <option value="{{ $item->id }}">{{ $item->name }}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                          <br>


                      </div>
                    <p></p>
                      <div class="row">
                          <div class="col-md-4">
                              <label for="postal_address" class="form-label" style="font-size:large">Postal Address</label>
                              <div class="form-group">
                                  <input type="text" name="postal_address"  id="postal_address" class="form-control border-start-0"  placeholder="Postal Address" />
                              </div>
                          </div>
                          <div class="col-md-4">
                              <label for="postal_code" class="form-label"style="font-size:large">Postal Code</label>
                              <div class="form-group">
                                  <input type="number" name="postal_code" id="postal_code" class="form-control border-start-0"  placeholder="Postal code" />
                              </div>
                          </div>


                          <div class="col-md-4">
                              <label for="city" class="form-label"style="font-size:large">City/Town</label>
                              <div class="form-group">
                                  <input type="text" name="city" id="city"  class="form-control border-start-0" placeholder="City/Town" />
                              </div>
                          </div>

                      </div>
                      <p></p>
                      <div class="row">
                          <div class="col-md-4">
                              <label for="postal_code" class="form-label"style="font-size:large">Phone Number</label>
                              <div class="form-group">
                                  <input type="number" name="phone"   class="form-control border-start-0" id="phone" placeholder="Phone Number" />
                              </div>
                          </div>
                          <div class="col-md-4">
                              <label for="postal_address" class="form-label" style="font-size:large">Marital Status</label>
                              <div class="form-group">
                                  <select name="marital"  id="marital" required="" class="form-control">
                                      <option value="" selected="" disabled="">Select </option>
                                      @foreach($marital as $item)
                                          <option value="{{ $item->id }}">{{ $item->name }}</option>
                                      @endforeach

                                  </select>
                              </div>
                          </div>

                          <div class="col-md-4">
                              <label for="city" class="form-label"style="font-size:large">Do you Have Any Disability?</label>
                              <div class="form-group">
                                  <select name="disability" id="disability" required="" class="form-control">
                                      <option value="" selected="" disabled="">Select Status</option>
                                      <option value="Yes">Yes</option>
                                      <option value="No">No</option>

                                  </select>
                              </div>
                          </div>

                      </div>

                      <p></p>

                      <div class="row" id="group1" style="display: none">

                          <div class="col-md-6">
                              <label for="inputLastName2" class="form-label" style="font-size:large" >Disability Registration Number</label>
                              <div class="form-group">
                                  <input name="disabilitydescription" class="form-control" type="text" id="disabilitydescription" placeholder="Disability Description" >

                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="mb-3 form-group">
                                  <label for="reg_certificate" class="form-label">Upload Registration Certificate in PDF Format.Ensure document is less than 2mbs</label>
                                  <input type="file" name="reg_certificate" id="reg_certificate" class="form-control"  accept="application/pdf">
                              </div>
                          </div>


                      </div>
                      <p></p>

                      <div class="col-12" >
                          <button type="submit" style="width: 100%" class="btn btn-success " style="font-size:large">Submit</button>
                      </div>

                  </form>
              </div>
          </div>
      </div>
  </div>
    <script>
        $(function () {

            $('#disability').on('change', function() {

                if ( this.value == "Yes" )
                {
                    $("#group1").show();


                }
                else
                {
                    $("#group1").hide();

                }


            });
        });
    </script>
    <script language="javascript">
        var today = new Date();



        $('#date_picker').attr('max',today);
        $('#date_picker2').attr('max',today);
    </script>


    <script type="text/javascript">
        $(document).ready(function (){
            $('#myForm').validate({
                rules: {
                    title: {
                        required : true,
                    },
                    dob: {
                        required : true,
                    },
                    idnumber: {
                        required : true,
                    },
                    // kra: {
                    //     required : true,
                    // },
                    gender: {
                        required : true,
                    },
                    // nationality: {
                    //     required : true,
                    // },
                    ethnicity: {
                        required : true,
                    },
                    county: {
                        required : true,
                    },
                    // constituency: {
                    //     required : true,
                    // },

                    postal_address: {
                        required : true,
                    },
                    postal_code: {
                        required : true,
                    },
                    city: {
                        required : true,
                    },
                    phone: {
                        required : true,
                    },

                    marital: {
                        required : true,
                    },
                    disability: {
                        required : true,
                    },


                    disabilitydescription: {
                        required : function(element){
                            return Number(($('#disability').val()=="Yes"));
                        },
                    },
                    reg_certificate: {
                        required : function(element){
                            return Number(($('#disability').val()=="Yes"));
                        },
                    },

                },
                messages :{
                    title: {
                        required : 'Please Select The Title',
                    },
                    dob: {
                        required : 'Please Select Date of Birth',
                    },
                    idnumber: {
                        required : 'Please EnterNational ID/ Passport Number',
                    },
                    // kra: {
                    //     required : 'Please Enter KRA PIN Number',
                    // },
                    gender: {
                        required : 'Please Select Appropriate Gender',
                    },
                    // nationality: {
                    //     required : 'Please Select Nationality',
                    // },
                    ethnicity: {
                        required : 'Please Select Ethnicity',
                    },
                    county: {
                        required : 'Please Select Home County',
                    },
                    // constituency: {
                    //     required : 'Please Select Constituency',
                    // },
                    postal_address: {
                        required : 'Please Enter Postal Address',
                    },
                    postal_code: {
                        required : 'Please Enter the Postal Code',
                    },
                    city: {
                        required : 'Please Enter The City',
                    },
                    phone: {
                        required : 'Please Enter Phone Number',
                    },

                    marital: {
                        required : 'Please Select Marital Status',
                    },
                    disability: {
                        required : 'Please Select Disability',
                    },

                    disabilitydescription: {
                        required : 'Please Enter Disability Description',
                    },
                    reg_certificate: {
                        required : 'Please Upload Registration Certificate',
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
