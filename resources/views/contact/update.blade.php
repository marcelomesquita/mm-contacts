@extends('template.app')

@section('content')
	<h2>Update Contact</h2>
	<hr />

	<div class="row">
		<div class="col-md-6">
			<form action="{{ url('save') }}" method="post">
				{{ csrf_field() }}

				<input type="hidden" name="id" value="{{ $contact->id }}" />

				<div class="row">
					<div class="form-group col-md-12 {{ $errors->has('name') ? 'has-error' : '' }}">
						<label class="control-label">Name</label>
						<input type="text" name="name" class="form-control" value="{{ $contact->name }}" autofocus />
						@if($errors->has('name'))
							<span class="help-block">{{ $errors->first('name') }}</span>
						@endif
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection
