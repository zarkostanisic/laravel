@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Discusions
                    <a href="{{ route('discusions.create' )}}">Create new discusion</a>
                </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Channel</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($discusions as $discusion)
                            <tr>
                                <td><a href="{{ route('discusions.show', $discusion->slug)}}">{{ $discusion->title }}</a></td>
                                <td>{{ $discusion->channel->title }}</td>
                                <td><a href="{{ route('discusions.edit', $discusion->id) }}" class="btn btn-primary">EDIT</a></td>
                                <td>
                                    <form action="{{ route('discusions.destroy', $discusion->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger">DELETE</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $discusions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
