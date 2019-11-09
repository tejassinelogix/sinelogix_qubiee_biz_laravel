@include('inc.header')
<div class="container">
	<div class="row">
		<div class="col-lg-6">
			<form class="form-horizontal" method="post" action="{{ url('/edit', array($articles->id)) }}">
				{{ csrf_field()}}
			  <fieldset>
			    <legend>Laravel CRUD Application</legend>
			    @if(count($errors) > 0)
			    	@foreach($errors->all() as $error)
			    	<div class="alert alert-danger">
			    		{{$error}}
			    	</div>

			    	@endforeach
			    @endif
			    <div class="form-group">
			      <label class="form-label">Title</label>
			      
			        <input type="text" name="title" id="title" value="<?php echo $articles->title;?>" class="form-control">
			      
			    </div>
			    
			    
			    <div class="form-group">
			      <label>Description</label>
			      <textarea class="form-control" name="description" id="description" rows="3"><?php echo $articles->description;?></textarea>
			    </div>
			    
			    <button type="submit" class="btn btn-primary">Submit</button>
			    <button type="reset" class="btn btn-primary">Cancel</button>
			    <a href="{{ url('/') }}" class="btn btn-primary"> Back </a>
			  </fieldset>
			</form>
		</div>
	</div>
</div>

@include('inc.footer')