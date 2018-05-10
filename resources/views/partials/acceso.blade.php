@if (session()->has('acceso'))
	<div class="alert alert-dismissable alert-danger ">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<strong>
			{!! session()->get('acceso') !!}
		</strong>
	</div>
@endif