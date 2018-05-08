@if (session()->has('msg'))
	<div>
		<strong>
			{!! session()->get('msg') !!}
		</strong>
	</div>
@endif