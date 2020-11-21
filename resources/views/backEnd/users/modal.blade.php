<div class="table-responsive">
	<table class="table table-striped">
		<tr>
			<td>First Name</td>
			<td>{{$user->first_name}}</td>
		</tr>
		<tr>
			<td>Last Name</td>
			<td>{{$user->last_name}}</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>{{$user->email}}</td>
		</tr>
		<tr>
			<td>Phone</td>
			<td>{{$user->phone}}</td>
		</tr>
		<tr>
			<td>Group</td>
			<td>{{!empty($user->group->name)?$user->group->name:''}}</td>
		</tr>
		<tr>
			<td>Phone</td>
			<td>{{!empty($user->status)? status($user->status): ''}}</td>
		</tr>
		
	</table>
</div>