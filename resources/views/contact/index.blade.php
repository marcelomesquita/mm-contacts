@extends('template.app')

@section('content')
	<div class="row">
		<div class="col-sm-11">
			<h2>
				Contacts
				<a href='{{ url("create/") }}' class="btn btn-xs btn-primary" title="create"><span class="glyphicon glyphicon-plus"></span></a>
			</h2>
			<hr />

			@foreach($agenda as $index => $contacts)
				<h5 id="{{ $index }}" class="{{ count($contacts) == 0 ? 'text-muted' : '' }}">{{ $index }}</h5>
				<hr />

				<div class="row">
					@foreach($contacts as $contact)
						<div class="col-sm-3">
							<div class="panel panel-default">
								<div class="panel-heading">
									<div class="btn-group btn-group-xs pull-right">
										<a href='{{ url("update/{$contact->id}") }}' class="btn btn-xs btn-default" title="update"><span class="glyphicon glyphicon-pencil"></span></a>
										<a href='{{ url("delete/{$contact->id}") }}' class="btn btn-xs btn-danger" title="delete" onclick="return confirm('Are you sure?')"><span class="glyphicon glyphicon-trash"></span></a>
									</div>
									{{ $contact->name }}
								</div>
								<div class="panel-body">
									@if(count($contact->phones) > 0)
										@foreach($contact->phones as $phone)
											<p><strong>Phone</strong>: ({{ $phone->area }}) {{ $phone->number }}</p>
										@endforeach
									@else
										<p class="text-muted">no phone found</p>
									@endif
								</div>
							</div>
						</div>
					@endforeach
				</div>
			@endforeach
		</div>
		<div class="col-sm-1">
			<ul class="affix list-unstyled" style="right: 15px;">
				@foreach($agenda as $index => $contacts)
					<li><a href="#{{ $index }}" class="btn btn-xs btn-link {{ count($contacts) == 0 ? 'disabled' : '' }}">{{ $index }}</a></li>
				@endforeach
			</ul>
		</div>
	</div>
@endsection
