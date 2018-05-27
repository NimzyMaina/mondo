@extends('layouts.dash')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                @if(isset($subtitle))
                    <div class="card-title">
                        <h4>{{$subtitle}}</h4>
                    </div>
                @endif
                <div class="card-body">
                    <div class="form-basic">
                        <form class="driver-form" action="post">
                            @csrf
                            @include('layouts.alert')
                            <!-- driver name & id -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <p class="text-muted m-b-15 f-s-12">Enter Driver Name <span class="text-danger">*</span></p>
                                        <input id="name" name="name" type="text" class="form-control input-flat " placeholder="Driver Name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <p class="text-muted m-b-15 f-s-12">Enter Driver ID <span class="text-danger">*</span></p>
                                        <input id="driver_id" name="driver_id" type="text" class="form-control input-flat " placeholder="Driver ID">
                                    </div>
                                </div>
                            </div>
                                <!-- end driver name & id -->
                            <!-- driver vehicle type & owner -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <p class="text-muted m-b-15 f-s-12">Select Vehicle Type <span class="text-danger">*</span></p>
                                        {!! Form::select('vehicle_type_id', $vehicleTypes, old('vehicle_type_id',isset($driver)?$driver->vehicle_type_id:''), ['class' => 'form-control select2','id' => 'vehicle_type_id' ]) !!}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <p class="text-muted m-b-15 f-s-12">Enter Vehicle Owner</p>
                                        <input id="vehicle_owner" name="vehicle_owner" type="text" class="form-control input-flat " placeholder="Vehicle Owner">
                                    </div>
                                </div>
                            </div>
                            <!-- end vehicle type & owner -->
                            <p class="text-muted m-b-15 f-s-12 text-center">Driver Checklist</p>
                            <hr/>
                            <!-- checklist -->
                            <div class="row">
                                <div class="col-lg-10 offset-lg-1">
                                    <div class="form-check-inline col-lg-2">
                                        <label class="form-check-label"><input name="active" class="form-check-input icheck" type="checkbox"> Active</label>
                                    </div>
                                    <div class="form-check-inline col-lg-2">
                                        <label class="form-check-label"><input name="documents" class="form-check-input icheck" type="checkbox"> Documents</label>
                                    </div>
                                    <div class="form-check-inline col-lg-2">
                                        <label class="form-check-label"><input name="trained" class="form-check-input icheck" type="checkbox"> Trained</label>
                                    </div>
                                    <div class="form-check-inline col-lg-2">
                                        <label class="form-check-label"><input name="online" class="form-check-input icheck" type="checkbox"> Online</label>
                                    </div>
                                    <div class="form-check-inline col-lg-2">
                                        <label class="form-check-label"><input name="inspected" class="form-check-input icheck" type="checkbox"> Inspected</label>
                                    </div>
                                    <div class="form-check-inline col-lg-2">
                                        <label class="form-check-label"><input name="banned" class="form-check-input icheck" type="checkbox"> Banned</label>
                                    </div>
                                    <div class="form-check-inline col-lg-2">
                                        <label class="form-check-label"><input name="registration_fees" class="form-check-input icheck" type="checkbox"> Reg. Fees</label>
                                    </div>
                                    <div class="form-check-inline col-lg-3">
                                        <label class="form-check-label"><input name="smartphone" class="form-check-input icheck" type="checkbox"> Smartphone</label>
                                    </div>
                                </div>
                            </div>
                            <!-- end checklist -->
                            <br><p class="text-muted m-b-15 f-s-12 text-center">Driver Phone & Contact Information</p>
                            <hr/>
                            <!-- phone number & call provider id -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <p class="text-muted m-b-15 f-s-12">Enter Phone Number <span class="text-danger">*</span></p>
                                        <input id="phone_number" name="phone_number" type="text" class="form-control input-flat " placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <p class="text-muted m-b-15 f-s-12">Select Call Provider <span class="text-danger">*</span></p>
                                        {!! Form::select('call_provider_id', $providers, old('call_provider_id',isset($driver)?$driver->call_provider_id:''), ['class' => 'form-control select2' ]) !!}
                                    </div>
                                </div>
                            </div>
                            <!-- end phone number & call provider id  -->

                            <!-- phone model & internet provider id -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <p class="text-muted m-b-15 f-s-12">Enter Phone Model</p>
                                        <input id="phone_model" name="phone_model" type="text" class="form-control input-flat " placeholder="Phone Model">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <p class="text-muted m-b-15 f-s-12">Select Internet Provider <span class="text-danger">*</span></p>
                                        {!! Form::select('isp_provider_id', $providers, old('isp_provider_id',isset($driver)?$driver->isp_provider_id:''), ['class' => 'form-control select2' ]) !!}
                                    </div>
                                </div>
                            </div>
                            <!-- end phone model & internet provider id  -->

                            <br><p class="text-muted m-b-15 f-s-12 text-center">Driver Location & Work Hours Information</p>
                            <hr/>

                            <!-- zone & area -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <p class="text-muted m-b-15 f-s-12">Select Driver Zone <span class="text-danger">*</span></p>
                                        {!! Form::select('zone_id', $zones, old('zone_id',isset($driver)?$driver->zone_id:''), ['class' => 'form-control select2' ]) !!}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <p class="text-muted m-b-15 f-s-12">Enter Driver Area</p>
                                        <input id="area" name="area" type="text" class="form-control input-flat " placeholder="Driver Area">
                                    </div>
                                </div>
                            </div>
                            <!-- end zone & area  -->

                            <!-- station & work hours -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <p class="text-muted m-b-15 f-s-12">Enter Driver Station</p>
                                        <input id="station" name="station" type="text" class="form-control input-flat " placeholder="Driver Station">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <p class="text-muted m-b-15 f-s-12">Select Driver Work Hours <span class="text-danger">*</span></p>
                                        {!! Form::select('hour_id', $hours, old('hour_id',isset($driver)?$driver->hour_id:''), ['class' => 'form-control select2' ]) !!}
                                    </div>
                                </div>
                            </div>
                            <!-- end station & work hours  -->

                            <div class="row">
                                <div class="col-lg-3 offset-lg-9">
                                <button class="btn btn-primary pull-right" type="submit">SUBMIT</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

@push('css')
<link href="{{asset('js/lib/icheck/skins/square/blue.css')}}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{asset('js/lib/icheck/icheck.min.js')}}"></script>
<!-- Form validation -->
<script src="{{asset('js/lib/form-validation/jquery.validate.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square',
            increaseArea: '20%' // optional
        });
    });

    jQuery.validator.addMethod("lettersonly", function(value, element)
    {
        return this.optional(element) || /^[a-z," "]+$/i.test(value);
    }, "Letters and spaces only please");

    jQuery.validator.addMethod("alphanumeric", function(value, element)
    {
        return this.optional(element) || /^[a-z,0-9" "]+$/i.test(value);
    }, "Alphanumeric characters only please");

    var form_validation = function() {
        var e = function() {
            jQuery(".driver-form").validate({
                ignore: [],
                errorClass: "invalid-feedback animated fadeInDown",
                errorElement: "div",
                errorPlacement: function(e, a) {
                    jQuery(a).parents(".form-group").append(e)
                },
                highlight: function(e) {
                    jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
                },
                success: function(e) {
                    jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
                },
                rules: {
                    "name": {
                        required: true,
                        minlength: 3,
                        lettersonly: true
                    },
                    "driver_id": {
                        required: !0,
                        minlength: 3,
                        digits: true
                    },
                    "vehicle_type_id": {
                        required: true
                    },
                    "phone_number": {
                        required: true
                    },
                    "call_provider_id": {
                        required: true
                    },
                    "isp_provider_id": {
                        required: true
                    },
                    "zone_id": {
                        required: true
                    },
                    "hour_id": {
                        required: true
                    },
                    "vehicle_owner": {
                        lettersonly: true
                    },
                    "phone_model": {
                        alphanumeric: true
                    },
                    "station": {
                        lettersonly: true
                    },
                    "area": {
                        lettersonly: true
                    }
                },
                messages: {
                    "name": {
                        required: "Please enter a drive name",
                        minlength: "Driver name must consist of at least 3 characters"
                    },
                    "driver_id": {
                        required: "Please enter a valid driver ID",
                        minlength: "Driver ID must consist of at least 3 characters"
                    },
                    "vehicle_type_id": "Please select a vehicle type",
                    "phone_number": "Please enter driver phone number",
                    "call_provider_id": "Please select call provider",
                    "isp_provider_id": "Please select the internet provider",
                    "zone_id": "Please select the driver zone",
                    "hour_id": "Please select the driver work hours"
                }
            })
        }
        return {
            init: function() {
                e(), jQuery(".select2").on("change", function() {
                    jQuery(this).valid()
                })
            }
        }
    }();
    jQuery(function() {
        form_validation.init()
    });

</script>
@endpush