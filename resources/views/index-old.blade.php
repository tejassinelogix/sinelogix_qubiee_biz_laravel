@include('inc.header')
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<fieldset>
			    <legend>Laravel CRUD Application</legend>
			    <div class="row">
			    	<div class="col-md-6 col-lg-6">
			    		@if(session('info'))
					    <div class="alert alert-success">
					    	{{ session('info') }}
					    </div>
					    @endif
			    	</div>
			    </div>
			    </div>
			    
					<table class="table table-stripped table-hover">
					  <thead>
					    <tr>
					      <th scope="col">ID</th>
					      <th scope="col">Title</th>
					      <th scope="col">Discription</th>
					      <th scope="col">Update/Delete</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@if(count($articles)>0)
					  		@foreach($articles->all() as $article)

					    <tr>
					      <th scope="row">{{ $article->id }}</th>
					      <td>{{ $article->title }}</td>
					      <td>{{ $article->description }}</td>
					      <td>
					      	<a class="btn btn-primary" href='{{ url("/read/{$article->id}") }}'>Read </a>
					      	<a class="btn btn-success" href='{{ url("/update/{$article->id}") }}'>Update </a>
					      	<a class="btn btn-danger" href='{{ url("/delete/{$article->id}") }}'>Delete </a>
					      </td>
					    </tr>

					    @endforeach
					  	@endif
					   </tbody>
					</table> 
			</fieldset>
		</div>
	</div>
</div>

@include('inc.footer')