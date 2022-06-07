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
					<span class="caption-subject bold uppercase">Customer</span>
				</div>
				<div class="actions">
					<a href="{{ url('admin/customer/create') }}" class="btn btn-danger btn-circle"><i class="fa fa-plus"></i><span class="hidden-480"> Add </span></a>
				</div>
			</div>
			
			<div class="portlet-body">
				<form method="GET" class="form-horizontal form-bordered form-label-stripped" action="{{ url('admin/customer')}}">
					<div class="form-body">
						<div class="form-group">
							<div class="col-md-5">
								<label class="col-md-3 control-label">Filter : </label>
								<div class="col-md-9">
									<input class="form-control" type="text" id="keyword" name="keyword" placeholder="Keyword">
								</div>
							</div>
							<div class="col-md-2">
								<button type="submit" class="btn btn-sm  green-haze btn-circle"></i>Search</button>
							</div>
						</div>
					</div>
				</form>
				<div class="table-container">
					<table  class="table table-striped table-bordered table-hover">
						<thead>
							<tr role="row" class="heading">
								<th width="5%">
										No
								</th>
								<th width="15%">
										Name
								</th>
								<th width="35%">
										Adddress
								</th>
								<th width="10%">
										Phone Number
								</th>
								<th width="20%">
										Date Registered
								</th>
								<th width="15%">
										Action
								</th>
							</tr>
						</thead>
						<tbody>
						@if($customer->count() > 0)
							@foreach($customer as $item)
							<tr>
								<td>
									{{ $loop->iteration}}
								</td>
								<td>
									{{ $item->name}}
								</td>
								<td>
									{{ $item->address}}
								</td>
								<td>
									{{ $item->phone}}
								</td>
								<td>
									{{ $item->created_at }}
								</td>
								<td>
									<a class="btn btn-warning btn-sm" type="button" data-toggle="tooltip"  title="Edit"  href="{{ url('admin/customer/'.$item->id.'/edit') }}"><i class='fa fa-pencil'></i> </a>
									<a href='javascript:void(0);' data-toggle="tooltip"  title="Delete" onclick="hapusid(`{{ $item->id }}`)" class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> </a>
								</td>
							</tr>
							@endforeach
						@else
							<tr>
								<td colspan="6" align="center">Data Not Found</td>
							</tr>
						@endif
						</tbody>
					</table>
					{{ $customer->links() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css" rel="stylesheet" >
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js" type="text/javascript"></script>
@stop

@section('script')
<script>
	// tampildata();
	// function tampildata(){
	// 	var searchname 	= $("#searchname").val();
	// 	var datesearch 	= $("#datesearch").val();
	// 	$.ajax({
	// 		type	: 'POST',
	// 		url		: "{{ url('admin/customer') }}",
	// 		data	: {
	// 			"searchname" : searchname,
	// 			"datesearch" : datesearch,
	// 			"_token"  : "{{ csrf_token()}}",
	// 		},
	// 		cache	: false,
	// 		success	: function(data){
	// 			$("#tampildata").html(data);
	// 		}
	// 	});
	// 	return false;
	// }

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
                    url: "{{ url('admin/customer/destroy') }}",
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