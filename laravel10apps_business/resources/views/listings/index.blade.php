@extends ('layouts.app')

@section ('content')
@if (count($listings) > 0)
<h1>Listings</h1>
<ul>
    @foreach ($listings as $listing)
        <li><a href="/listings/{{ $listing->id }}">{{ $listing->name }}</a></li>
    @endforeach
@endif
</ul>
@endsection