@extends('layouts.admin')

@section('title')
	<title> {{ $title }} </title>
@endsection	
@section('section')
<div class="row">
	<div class="col-md-12">
		<div class="portlet box yellow-saffron">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>
					<span class="caption-subject bold uppercase">User</span>
				</div>
			</div>
				
			<div class="portlet-body form">
				<form action="{{ url('admin/user/create') }}" id="formuser" class="form-horizontal form-bordered form-label-stripped" method="POST">
					{{ csrf_field() }}
					<div class="form-body ">
						<div class="form-group">
							<label class="col-md-2 control-label">Nama<span class="required">*</span></label>
							<div class="col-md-10">
								<input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Email<span class="required">*</span></label>
							<div class="col-md-10">
								<input type="email" class="form-control" id="email" value="{{ old('email') }}" name="email" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Password <span class="required">*</span></label>
							<div class="col-md-10">
								<input class="form-control" type="password" id="password" name="password" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Konfirmasi Password <span class="required">*</span></label>
							<div class="col-md-10">
								<input class="form-control" type="password" id="confirm_password"  name="confirm_password" >
							</div>
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-8 col-md-4">
								<a href="{{ url('admin/user') }}" class="btn btn-sm btn-danger btn-circle" name="back"><i class="fa fa-angle-left"></i> Back</a>
								<button class="btn btn-sm  btn-warning btn-circle" name="reset" id="reset" type="reset" ><i class="fa fa-reply"></i> Reset</button>
								<button class="btn btn-sm  green-haze btn-circle"  name="submit" id="submituser"><i class="fa fa-check"></i> Save</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
@section('css')
<link href="{{ asset('public/vendor/select2/css/select2.min.css') }}" rel="stylesheet"  />
<link href="{{ asset('public/vendor/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet"  />
<link href="{{ asset('public/vendor/jquery-tags-input/jquery.tagsinput.css') }}" rel="stylesheet"  />
<link href="{{ asset('public/vendor/typeahead/typeahead.css') }}" rel="stylesheet"  >
@stop

@section('js')
<script src="{{ asset('public/vendor/select2/js/select2.min.js') }}" type="text/javascript" ></script>
<script src="{{ asset('public/vendor/jquery.validate.min.js') }}" type="text/javascript"  ></script>
<script src="{{ asset('public/vendor/jquery-tags-input/jquery.tagsinput.min.js') }}" type="text/javascript"  ></script>
<script src="{{ asset('public/vendor/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript" ></script>
<script src="{{ asset('public/vendor/bootstrap-touchspin/bootstrap.touchspin.js') }}" type="text/javascript" ></script>
<script src="{{ asset('public/vendor/bootstrap-maxlength/bootstrap-maxlength.min.js') }}" type="text/javascript" ></script>

@stop

@section('script')
<script>
    $(".select2").select2({
        placeholder: 'Pilih Role'
    });
	$(document).ready(function() { 
				 
        var form = $('#formuser');
        var error = $('.alert-danger', form);
        var success = $('.alert-success', form);
        
        form.validate({
            doNotHideMessage: true, 
            errorElement: 'span', 
            errorClass: 'help-block help-block-error', 
            focusInvalid: false, 
            rules:{
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                    remote:{
                            url:"{{ url('admin/user/cekemail') }}",
                            type:"POST",
                            dataType:"json",
                            cache:false,
                            data:{
                                email:function(){
                                    return $("#email").val();
                                },
                                _token : "{{ csrf_token() }}"
                            },
                            response:function(data){
                                console.log(data);
                                if(data.responseText ==false){
                                    messages:{
                                        email:{
                                            remote:jQuery.validator.format("{0} tidak tersedia")
                                        }
                                    } 
                                }
                                
                            }
                        }
                },
                password: {
                    required: true,
                    minlength: 8,
                },
                confirm_password: {
                    required: true,
                    equalTo : "#password", 
                },
                role: {
                    required: true, 
                },
                
            },
            
            messages:{
                password:{
                    required: "Password Harus Di Isi",
                    minlength: 'Password minimal 8 karakter'
                },
                confirm_password: {
                    required: "Konfirmasi Password Harus Di Isi",
                    equalTo : "Konfirmasi Password harus sama dengan Password"
                },
                email: {
                    required: 'Email harus diisi',
                    remote: 'Email Sudah Digunakan',
                },
                name: {
                    required: 'Nama harus diisi',
                },
                role: {
                    required: 'Role belum dipilih',
                },
            },
            errorPlacement: function (error, element) { 
                if (element.attr("data-error-container")) { 
                    error.appendTo(element.attr("data-error-container"));
                }else {
                    error.insertAfter(element); 
                }
            },
            invalidHandler: function (event, validator) { 
                    success.hide();
                    error.show();
                    Metronic.scrollTo(error, -200);
                },

            highlight: function (element) { 
                $(element)
                    .closest('.form-group').removeClass('has-success').addClass('has-error'); 
            },

            unhighlight: function (element) { 
                $(element)
                    .closest('.form-group').removeClass('has-error'); 
            },
            
            success: function (label) {
                label
                    .addClass('valid') 
                    .closest('.form-group').removeClass('has-error').addClass('has-success'); 
            },
            
            submitHandler: function (form) {
                success.show();
                error.hide();
                form.submit(); 
            },
        });
        
        $('.select2me', form).change(function () {
            form.validate().element($(this)); 
        });

        $("#select2_tags").change(function() {
            form.validate().element($(this));  
        }).select2({
            tags: ["red", "green", "blue", "yellow", "pink"]
        });
    });
	
</script>
@stop


