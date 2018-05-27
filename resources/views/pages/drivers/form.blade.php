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
                        <form class="driver-form" method="post">
                            @csrf
                            @if($is_edit)
                                <input name="_method" type="hidden" value="PUT">
                                @endif
                            @include('layouts.alert')
                            <!-- driver name & id -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <p class="text-muted m-b-15 f-s-12">Enter Driver Name <span class="text-danger">*</span></p>
                                        <input id="name" name="name" type="text" class="form-control input-flat {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Driver Name" value="{{old('name',isset($driver)?$driver->name:'')}}">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <p class="text-muted m-b-15 f-s-12">Enter Driver ID <span class="text-danger">*</span></p>
                                        <input id="driver_id" name="driver_id" type="text" class="form-control input-flat {{ $errors->has('driver_id') ? ' is-invalid' : '' }}" placeholder="Driver ID" value="{{old('driver_id',isset($driver)?$driver->driver_id:'')}}">
                                        @if ($errors->has('driver_id'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('driver_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                                <!-- end driver name & id -->
                            <!-- driver vehicle type & owner -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <p class="text-muted m-b-15 f-s-12">Select Vehicle Type <span class="text-danger">*</span></p>
                                        {!! Form::select('vehicle_type_id', $vehicleTypes, old('vehicle_type_id',isset($driver)?$driver->vehicle_type_id:''), ['class' => 'form-control select2 '. ($errors->has('vehicle_type_id') ? ' is-invalid' : ''),'id' => 'vehicle_type_id' ]) !!}
                                        @if ($errors->has('vehicle_type_id'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('vehicle_type_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <p class="text-muted m-b-15 f-s-12">Enter Vehicle Owner</p>
                                        <input id="vehicle_owner" name="vehicle_owner" type="text" class="form-control input-flat {{ $errors->has('vehicle_owner') ? ' is-invalid' : '' }}" placeholder="Vehicle Owner" value="{{old('vehicle_owner',isset($driver)?$driver->vehicle_owner:'')}}">
                                        @if ($errors->has('vehicle_owner'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('vehicle_owner') }}</strong>
                                            </span>
                                        @endif
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
                                        <label class="form-check-label"><input value="1" name="active" class="form-check-input icheck" type="checkbox"  @if(old('active',(isset($driver)?$driver->active:false))) checked @endif> Active</label>
                                    </div>
                                    <div class="form-check-inline col-lg-2">
                                        <label class="form-check-label"><input value="1" name="documents" class="form-check-input icheck" type="checkbox" @if(old('documents',(isset($driver)?$driver->documents:false))) checked @endif> Documents</label>
                                    </div>
                                    <div class="form-check-inline col-lg-2">
                                        <label class="form-check-label"><input value="1" name="trained" class="form-check-input icheck" type="checkbox" @if(old('trained',(isset($driver)?$driver->trained:false))) checked @endif> Trained</label>
                                    </div>
                                    <div class="form-check-inline col-lg-2">
                                        <label class="form-check-label"><input value="1" name="online" class="form-check-input icheck" type="checkbox" @if(old('online',(isset($driver)?$driver->online:false))) checked @endif> Online</label>
                                    </div>
                                    <div class="form-check-inline col-lg-2">
                                        <label class="form-check-label"><input value="1" name="inspected" class="form-check-input icheck" type="checkbox" @if(old('inspected',(isset($driver)?$driver->inspected:false))) checked @endif> Inspected</label>
                                    </div>
                                    <div class="form-check-inline col-lg-2">
                                        <label class="form-check-label"><input value="1" name="banned" class="form-check-input icheck" type="checkbox" @if(old('banned',(isset($driver)?$driver->banned:false))) checked @endif> Banned</label>
                                    </div>
                                    <div class="form-check-inline col-lg-2">
                                        <label class="form-check-label"><input value="1" name="registration_fees" class="form-check-input icheck" type="checkbox" @if(old('registration_fees',(isset($driver)?$driver->registration_fees:false))) checked @endif> Reg. Fees</label>
                                    </div>
                                    <div class="form-check-inline col-lg-3">
                                        <label class="form-check-label"><input value="1" name="smartphone" class="form-check-input icheck" type="checkbox" @if(old('smartphone',(isset($driver)?$driver->smartphone:false))) checked @endif> Smartphone</label>
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
                                        <input id="phone_number" name="phone_number" type="text" class="form-control input-flat {{ $errors->has('phone_number') ? ' is-invalid' : '' }}" placeholder="Phone Number" value="{{old('phone_number',isset($driver)?$driver->phone_number:'')}}">
                                        @if ($errors->has('phone_number'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('phone_number') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <p class="text-muted m-b-15 f-s-12">Select Call Provider <span class="text-danger">*</span></p>
                                        {!! Form::select('call_provider_id', $providers, old('call_provider_id',isset($driver)?$driver->call_provider_id:''), ['class' => 'form-control select2'. ($errors->has('call_provider_id') ? ' is-invalid' : '') ]) !!}
                                        @if ($errors->has('call_provider_id'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('call_provider_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- end phone number & call provider id  -->

                            <!-- phone model & internet provider id -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <p class="text-muted m-b-15 f-s-12">Enter Phone Model</p>
                                        <input id="phone_model" name="phone_model" type="text" class="form-control input-flat {{ $errors->has('phone_model') ? ' is-invalid' : '' }}" placeholder="Phone Model" value="{{old('phone_model',isset($driver)?$driver->phone_model:'')}}">
                                        @if ($errors->has('phone_model'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('phone_model') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <p class="text-muted m-b-15 f-s-12">Select Internet Provider <span class="text-danger">*</span></p>
                                        {!! Form::select('isp_provider_id', $providers, old('isp_provider_id',isset($driver)?$driver->isp_provider_id:''), ['class' => 'form-control select2'.($errors->has('isp_provider_id') ? ' is-invalid' : '' )]) !!}
                                        @if ($errors->has('isp_provider_id'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('isp_provider_id') }}</strong>
                                            </span>
                                        @endif
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
                                        {!! Form::select('zone_id', $zones, old('zone_id',isset($driver)?$driver->zone_id:''), ['class' => 'form-control select2'.($errors->has('zone_id') ? ' is-invalid' : '' )]) !!}
                                        @if ($errors->has('zone_id'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('zone_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <p class="text-muted m-b-15 f-s-12">Enter Driver Area</p>
                                        <input id="area" name="area" type="text" class="form-control input-flat {{ $errors->has('area') ? ' is-invalid' : '' }}" placeholder="Driver Area" value="{{old('area',isset($driver)?$driver->area:'')}}">
                                        @if ($errors->has('area'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('area') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- end zone & area  -->

                            <!-- station & work hours -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <p class="text-muted m-b-15 f-s-12">Enter Driver Station</p>
                                        <input id="station" name="station" type="text" class="form-control input-flat {{ $errors->has('station') ? ' is-invalid' : '' }}" placeholder="Driver Station" value="{{old('station',isset($driver)?$driver->station:'')}}">
                                        @if ($errors->has('station'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('station') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <p class="text-muted m-b-15 f-s-12">Select Driver Work Hours <span class="text-danger">*</span></p>
                                        {!! Form::select('hour_id', $hours, old('hour_id',isset($driver)?$driver->hour_id:''), ['class' => 'form-control select2'.($errors->has('hour_id') ? ' is-invalid' : '' )]) !!}
                                        @if ($errors->has('hour_id'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('hour_id') }}</strong>
                                            </span>
                                        @endif
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