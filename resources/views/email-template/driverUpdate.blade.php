<p>
	Hello {{$data['name'] ??''}}, <br>
	Your Profile updated successfully,<br><br>
	Your updated info: <br>
	Email : {{$data['email'] ?? ''}} <br>
	@if(!empty($data['password']))
	Password : {{$data['password'] ?? ''}} <br>
	@endif
	Phone : {{$data['phone'] ?? ''}} <br>
	Regards, <br>

	Fare Trim
</p>