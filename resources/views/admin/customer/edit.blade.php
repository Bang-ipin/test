@extends('layouts.admin')

@section('title')
	<title> {{ $title }} </title>
@endsection
@section('section')
<div>
	<div id="ResponseInput"></div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="portlet box yellow-saffron">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>
					<span class="caption-subject bold uppercase">Edit Customer</span>
				</div>
			</div>
			
			<div class="portlet-body form">
				<form id="formcustomer" class="form-horizontal form-bordered form-label-stripped">
					<div class="form-body ">
						<div class="form-group">
							<label class="col-md-2 control-label">Name<span class="required">*</span></label>
							<div class="col-md-10">
								<input class="form-control" type="text" id="name" name="name" value="{{ $name }}" placeholder="Nama" maxlength="255" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Address<span class="required">*</span></label>
							<div class="col-md-10">
								<textarea rows="8" class="form-control" id="address"  name="address">{{ $address }}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Phone <span class="required">*</span></label>
							<div class="col-md-10">
								<input class="form-control" type="text" id="phone" name="phone" value="{{ $phone }}">
							</div>
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-8 col-md-4">
								<a href="{{ url('admin/customer') }}" class="btn btn-sm btn-danger btn-circle" name="back"><i class="fa fa-angle-left"></i> Back</a>
								<button type="button" class="btn btn-sm  green-haze btn-circle"  name="submit" id="savecustomer"><i class="fa fa-spinner fa-spin spiner loading-save" style="display:none"></i> <i class="fa fa-check"></i> Save</button>
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
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
<script src="{{ asset('public/vendor/bootstrap-maxlength/bootstrap-maxlength.min.js') }}" type="text/javascript" ></script>

@stop

@section('script')
<script>
		
	$(document).ready(function() { 

		$("#phone").keypress(function(data){
			if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
				return false;
			}
		});

        $("#savecustomer").click( function(e) {
            e.preventDefault();
            let name        = $("#name").val();
            let address     = $("#address").val();
            let phone       = $("#phone").val();
            if(name=='' || name==null){
                alert("name is required");
                $("#name").focus()
                exit();
            }
            if(address=='' || address==null){
                alert("Address is required");
                $("#address").focus()
                exit();
            }
            if(phone=='' || phone==null){
                alert("Phone Number is required");
                $("#phone").focus()
                exit();
            }
            $.ajax({
                url: "{{ url('admin/customer/update') }}",
                type: "POST",
                dataType: "json",
                cache: false,
                data: {
					"id"		: "{{ $id}}",
                    "name"      : name,
                    "address"   : address,
                    "phone"     : phone,
                    '_token'    : "{{ csrf_token() }}"
                },
                beforeSend: function (){
                    if(name && address && phone){
                        $("#savecustomer").addClass('disabled');
                        $(".loading-save").show(); 
                    }                
                },
                success:function(response){
                    setTimeout(function(){ 
                        if(response.status == 1){ 
                            $('#ResponseInput').html(response.message);
                            $("#savecustomer").removeClass('disabled');
                            $(".loading-save").hide();
                            setTimeout(function(){ 
                                window.location.href = "{{ url('admin/customer') }}";
                            }, 3000);
                        }
                        if(response.status == 0){ 
                            $('#ResponseInput').html(response.message);
                            $("#savecustomer").removeClass('disabled');
                            $(".loading-save").hide();
                        }
                        else {
                            $('#ResponseInput').html(response.message);
                        }
                    },800);
                },
                error:function(response){
                    Swal.fire({
                        type: 'error',
                        title: 'Opps!',
                        text: 'server error!'
                    });
                }
            });
        });
    });
	
</script>
@stop


