@extends('layouts.admin')

@section('title')
	<title> {{ $title }} </title>
@endsection
@section('section')

<div class="row">
	<div class="col-md-12">
		<div class="portlet box yellow">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>
					<span class="caption-subject bold uppercase">User</span>
				</div>
				<div class="actions">
					<a href="{{ url('admin/user/create') }}" class="btn btn-danger btn-circle"><i class="fa fa-plus"></i><span class="hidden-480"> Tambah </span></a>
				</div>
			</div>
			
			<div class="portlet-body">
				<div class="table-container">
					<table  class="table table-striped table-bordered table-hover" id="listuser">
						<thead>
							<tr role="row" class="heading">
								<th width="5%">
									 No
								</th>
								<th width="15%">
									 Email
								</th>
								<th width="15%">
									 Nama
								</th>
								<th width="10%">
									 Actions
								</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('css')
<link href="{{ asset('public/vendor/datatables/datatables.min.css') }}" rel="stylesheet" />
<link href="{{ asset('public/vendor/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css" rel="stylesheet" >
@stop

@section('js')
<script src="{{ asset('public/admin/js/datatable.js') }}"  ></script>
<script src="{{ asset('public/vendor/datatables/datatables.min.js') }}"  ></script>
<script src="{{ asset('public/vendor/datatables/plugins/bootstrap/datatables.bootstrap.js') }}"  ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js" type="text/javascript"></script>
@stop

@section('script')
<script>
	$(document).ready(function() { 
		var grid = new Datatable();

		grid.init({
			src: $("#listuser"),
			onSuccess: function (grid) {
				
			},
			onError: function (grid) {
				  
			},
			loadingMessage: 'Loading...',
			dataTable: {
				"lengthMenu": [
					[10, 20, 50, 100, 150],
					[10, 20, 50, 100, 150]  
				],
				"pageLength": 10, 
				"ajax": {
				  "url": "{{ url('admin/user') }}",
				  "data": {
					'_token': '{{ csrf_token() }}'
				  }
				 },
				"order": [
					[1, "asc"]
				] 
			}  
		});
	});
	function hapusid(id) {
        swal({
            title: "Are you sure?",
            text: "You will be delete this item ?",
            type: "warning",
            confirmButtonText: "Yes, delete",
            showCancelButton: true
        })
        .then((result) => {
            if (result.value) {
                $.ajax({
                    url: "{{ url('admin/user') }}",
                    type: "POST",
                    data:{
						'id':id,
						'_method':'DELETE',
						'_token': '{{ csrf_token() }}'
					},
                    success: function(){
                        swal(
                            'Success',
                            'Destroy Data <b style="color:green;">Success</b> button!',
                            'success'
                        ).then(function() {
                            location.reload();
                        });
                    },
                    error: function() {
                        swal({
                            title: 'Opps...',
                            text: 'Error',
                            type: 'error',
                            timer: '1500'
                        })
                    }
                });
            } else if (result.dismiss === 'cancel') {
                swal(
                    'Cancelled',
                    'Your stay here :)',
                    'error'
                )
            }
        })
       
    }
	
</script>
@stop