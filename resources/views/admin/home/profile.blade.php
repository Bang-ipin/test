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
				<form class="form-horizontal form-bordered form-label-stripped">
					<div class="form-body ">
						<div class="form-group">
							<label class="col-md-2 control-label">Nama</label>
							<div class="col-md-10">
								<input class="form-control" type="text" value="{{ $info->name }}" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Email </label>
							<div class="col-md-10">
								<input class="form-control" type="text" value="{{ $info->email }}" readonly>
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
@stop

@section('script')
@stop


