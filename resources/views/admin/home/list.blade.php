@extends('layouts.admin')

@section('title')
	<title> {{ $title }} </title>
@endsection
@section('section')
@section('content')
<div class="row">
	<div class="col-md-12">
        <div class="portlet box">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>
					<span class="caption-subject bold uppercase">BERANDALAN</span>
				</div>
			</div>
			
			<div class="portlet-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{ __('You are logged in!') }}
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
