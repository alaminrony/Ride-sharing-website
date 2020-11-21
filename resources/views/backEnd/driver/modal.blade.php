<div class="text-center p-2">
	<img src="{{asset($driver->profile_photo)}}" class="img-fluid w-50 rounded-circle">
</div>	

<div class="table-responsive">
<table class="table table-striped">
	<tr>
		<td>Name</td>
		<td>{{$driver->full_name }}</td>
	</tr>
	
	<tr>
		<td>Address	</td>
		<td>{{$driver->address }}</td>
	</tr>
        @if(!empty($driver->gender))
	<tr>
		<td>Gender</td>
		<td>{{($driver->gender==1)? 'Male': 'Female' }}</td>
	</tr>
        @endif
	<tr>
		<td>Email</td>
		<td>{{$driver->email }}</td>
	</tr>
	<tr>
		<td>Phone</td>
		<td>{{$driver->phone }}</td>
	</tr>
        @if(!empty($driver->date_of_birth))
	<tr>
		<td>Date of birth</td>
		<td>{{$driver->date_of_birth }}</td>
	</tr>
        @endif
	<tr>
		<td>Driving licence number</td>
		<td>{{$driver->driving_licence_no }}</td>
	</tr>
	<tr>
		<td>Australian licence number</td>
		<td>{{$driver->australian_driver_no }}</td>
	</tr>
	<tr>
		<td>Point</td>
		<td>{{$driver->d_point }}</td>
	</tr>
	<tr>
		<td>Rating Avg</td>
		<td>{{$driver->rating_value }}</td>
	</tr>
	<tr>
		<td>Phone verification</td>
		<td>{{$driver->phone_varification }}</td>
	</tr>
	<tr>
		<td>is online</td>
		<td>{{checkonline($driver->is_online) }}</td>
	</tr>
	<tr>
		<td>Current location gps</td>
		<td>{{$driver->current_location_gps }}</td>
	</tr>
	<tr>
		<td>Latitude</td>
		<td>{{$driver->latitude }}</td>
	</tr>
	<tr>
		<td>Longitude</td>
		<td>{{$driver->longitude }}</td>
	</tr>
	<tr>
		<td>Register ip address</td>
		<td>{{$driver->ip_address }}</td>
	</tr>
	<tr>
		<td>Last ip address</td>
		<td>{{$driver->last_ip_address }}</td>
	</tr>
	<tr>
		<td>Created At</td>
		<td>{{$driver->created_at }}</td>
	</tr>
        @if(!empty($driver->created_by))
	<tr>
		<td>Created By</td>
		<td>{{created_by($driver->created_by) }}</td>
	</tr>
        @endif
	<tr>
		<td>Last login</td>
		<td>{{$driver->last_login }}</td>
	</tr>
	<tr>
		<td>Status</td>
		<td>{{status($driver->active) }}</td>
	</tr>
	<tr>
		<td>Last location</td>
		{{-- <td>{{$driver->australian_driver_no }}</td> --}}
	</tr>

</table>
</div>