@extends('layouts.test')

@section('content')
	<div class="container">
		<hr color="#ff7f50">
		@if (!is_null($headline))
		<div class="row">
			<div class="headline col-md-12 mx-auto">
				<div class="row">
					<div class="col-md-3">
						<div>{{ str_limit('名前:' .$headline->name) }}</div>
					</div>
					<div class="col-md-3">
						<p class="gender mx-auto">{{ str_limit('性別:' .$headline->gender) }}</p>
					</div>
					<div class="col-md-3">
						<p class="hobby mx-auto">{{ str_limit('趣味:' .$headline->hobby) }}</p>
					</div>
					<div class="col-md-3">
						<p class="introduction mx-auto">{{ str_limit('自己紹介:' .$headline->introduction) }}</p>
					</div>
				</div>
			</div>
		</div>
		@endif
		<div class="row">
			<div class="posts col-md-12 mx-auto">
				@foreach($posts as $post)
				<hr color="#ff7f50">
				<div class="post">
					<div class="row">
							<div class="name col-md-3">
								<div class="name mx-auto">{{ str_limit('名前:' .$post->name) }}</div>
							</div>
							<div class="gender col-md-3">
								<p class="gender mx-auto ml-5">{{ str_limit('性別:' .$post->gender) }}</p>
							</div>
							<div class="col-md-3">
								<p class="hobby mx-auto">{{ str_limit('趣味:' .$post->hobby) }}</p>
							</div>
							<div class="col-md-3">
								<p class="introduction mx-auto">{{ str_limit('自己紹介:' .$post->introduction) }}</p>
							</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	@endsection