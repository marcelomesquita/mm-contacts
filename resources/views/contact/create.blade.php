@extends('template.app')

@section('content')
	<h2>Create Contact</h2>
	<hr />

	<div class="row">
		<div class="col-md-6">
			<form action="{{ url('save') }}" method="post">
				{{ csrf_field() }}

				<div class="row">
					<div class="form-group col-md-12 {{ $errors->has('name') ? 'has-error' : '' }}">
						<label class="control-label">Name</label>
						<input type="text" name="name" class="form-control" value="{{ old('name') }}" autofocus />
						@if($errors->has('name'))
							<span class="help-block">{{ $errors->first('name') }}</span>
						@endif
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-4 {{ $errors->has('area') ? 'has-error' : '' }}">
						<label class="control-label">Code Area</label>
						<input type="number" name="area" class="form-control" value="{{ old('area') }}" max="999" />
						@if($errors->has('area'))
							<span class="help-block">{{ $errors->first('area') }}</span>
						@endif
					</div>
					<div class="form-group col-md-8 {{ $errors->has('number') ? 'has-error' : '' }}">
						<label class="control-label">Phone Number</label>
						<input type="text" name="number" class="form-control" value="{{ old('number') }}" />
						@if($errors->has('number'))
							<span class="help-block">{{ $errors->first('number') }}</span>
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
