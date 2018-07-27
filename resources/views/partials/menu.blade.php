<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<a href="{{ route('home') }}" class="btn btn-primary">Home</a>
				<a href="{{ route('plan-list') }}" class="btn btn-primary">Pricing</a>
				<a href="{{ route('home.set-cookie-values', [
					'source'		=> 'google',
					'campaign'		=> 'test'
					]) }}" class="btn btn-primary">Set cookie values from url</a>

			</div>
		</div>
	</div>
</div>
<br />