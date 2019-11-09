@include('inc.header')
<div class="container">
	<div class="row">
		<legend>Read Article</legend>
		<h3>{{ $articles->title }}</h3>
		<p>{{ $articles->description }}</p>
	</div>
</div>

@include('inc.footer')