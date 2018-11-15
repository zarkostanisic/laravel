@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Channels
                    <a href="{{ route('channels.create' )}}">Create new channel</a>
                </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($channels as $channel)
                            <tr>
                                <td><a href="{{ route('channel', $channel->id) }}">{{ $channel->title }}</a></td>
                                <td><a href="{{ route('channels.edit', $channel->id) }}" class="btn btn-primary">EDIT</a></td>
                                <td>
                                    <form action="{{ route('channels.destroy', $channel->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger">DELETE</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $channels->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
