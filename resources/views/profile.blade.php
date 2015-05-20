@extends('master')

@section('title')
	Profile
@endsection


@section('content')

<div class="page-register">
	<form class="form-horizontal" method="post" action="profile/update" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="username" value="{{$profile->username}}">
		<input type="hidden" name="dataUri">
		
		<h4>Profile</h4>
		<div class="row">
			<div class="col-sm-9">
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right">ID</label>

					<div class="col-sm-10">
						<input class="form-control col-sm-12" type="text" value="{{$profile->code_id}}" readonly>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right">Username</label>

					<div class="col-sm-10">
						<input class="form-control col-sm-12" type="text" placeholder="Username" value="{{$profile->username}}" readonly>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right">Email</label>

					<div class="col-sm-10">                               
						<input class="form-control" type="email" name="email" value="{{$profile->email}}" required>
					</div>
				</div>
			
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right">Name</label>
					
					<div class="col-sm-5">
						<input class="form-control col-sm-6" type="text" name="firstName" value="{{$profile->first_name}}">
					</div>                                               
					<div class="col-sm-5">                               
						<input class="form-control col-sm-6" type="text" name="lastName" value="{{$profile->last_name}}">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right">Birth Date</label>
					
					<div class="col-sm-5">                               
						<input class="form-control datepicker" type="text" name="birthDate" value="{{\Carbon\Carbon::parse($profile->birth_date)->format('Y-m-d')}}">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right">Gender</label>

					<div class="col-sm-10">
						<input name="gender" type="radio" value="male" {{$profile->gender=='male'?'checked':''}}>
						<span> Male</span>
						&nbsp; &nbsp; &nbsp;
						<input name="gender" type="radio" value="female" {{$profile->gender=='female'?'checked':''}}>
						<span> Female</span>
					</div>
				</div>
			
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right">Marital Status</label>

					<div class="col-sm-9">
						<input name="status" type="radio" value="Single" {{$profile->marital_status=='Single'?'checked':''}}>
						<span>Single</span>
						&nbsp; &nbsp;
						<input name="status" type="radio" value="Married" {{$profile->marital_status=='Married'?'checked':''}}>
						<span>Married</span>
						&nbsp; &nbsp;
						<input name="status" type="radio" value="Widow/er" {{$profile->marital_status=='Widow/er'?'checked':''}}>
						<span>Widow/er</span>
						&nbsp; &nbsp;
						<input name="status" type="radio" value="Legally Separated" {{$profile->marital_status=='Legally Separated'?'checked':''}}>
						<span>Legally Separated</span>
						&nbsp; &nbsp;
						<input name="status" type="radio" value="Annulled" {{$profile->marital_status=='Annulled'?'checked':''}}>
						<span>Annulled</span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right">Citizenship</label>
					<div class="col-sm-3">                               
						<input class="form-control" type="text" name="citizenship" placeholder="Citizenship" value="{{$profile->citizenship}}">
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<input id="profile" name="avatar" type="file" accept="image/x-png, image/gif, image/jpeg, image/jpg" style="display:none;">
				<b class="col-sm-11 text-center">Profile Picture</b>
				<label for="profile" style="display: block;text-align: center;">
				<img for="profile" src="{{$profile->images}}" style="max-width: 100%;">
				</label>
				<div class="text-center">
					<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#camera">Take Camera</button>
				</div>
			</div>
		</div>
		<hr>
		<h4>Contact Details</h4>
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right">Phone</label>
					<div class="col-sm-3">                               
						<input class="form-control" type="text" name="phone[home]" placeholder="Home Phone#" value="{{$profile->phone->home}}">
					</div>
					<div class="col-sm-3">                               
						<input class="form-control" type="text" name="phone[mobile]" placeholder="Mobile #" value="{{$profile->phone->mobile}}">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right">Present Address</label>
					<div class="col-sm-8">                               
						<input class="form-control" type="text" name="address[presentAddress]" placeholder="Street, Barangay, City/Province" value="{{$profile->address->presentAddress}}">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right">Permanent Address</label>
					<div class="col-sm-8">                               
						<input class="form-control" type="text" name="address[permanentAddress]" placeholder="Street, Barangay, City/Province" value="{{$profile->address->permanentAddress}}">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right">ZIP</label>
					<div class="col-sm-3">                               
						<input class="form-control" type="text" name="address[zipCode]" placeholder="Zip Code" value="{{$profile->zip}}">
					</div>
				</div>
			</div>
		</div>
		<hr>
		<h4>Vehicle Details</h4>
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right">Plate No.</label>
					<div class="col-sm-5">                               
						<input class="form-control" type="text" name="vehicle[plateNumber]" placeholder="#" value="{{$profile->vehicle->plateNumber}}">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right">Model</label>
					<div class="col-sm-8">                               
						<input class="form-control" type="text" name="vehicle[model]" value="{{$profile->vehicle->model}}">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right">Brand</label>
					<div class="col-sm-8">                               
						<input class="form-control" type="text" name="vehicle[brand]" value="{{$profile->vehicle->brand}}">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right">Color</label>
					<div class="col-sm-8">                               
						<input class="form-control" type="text" name="vehicle[color]" value="{{$profile->vehicle->color}}">
					</div>
				</div>
			</div>
		</div>
		<hr>
		<h4>Notes</h4>
		<div class="row">
			<div class="col-sm-12">
				<textarea class="form-control" name="notes" rows="11">{{$profile->notes}}</textarea>
			</div>
		</div>
		
		<br class="clr">

		<div class="clearfix form-actions">
			<button class="btn btn-primary pull-right" name="register" type="submit">Update Profile</button>
		</div>
	</form>

</div>


<!-- Modal -->
<div class="modal fade" id="camera" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Modal title</h4>
			</div>
			<div class="modal-body">
				<section id="photobooth" style="height: 400px; width:500px;margin: 0 auto;"></section>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- /.modal -->

@endsection
