<table class="table table-responsive" id="categries-table">
    <thead>
        <tr>
            <th>Name</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($categries as $categry)
        <tr>
            <td>{!! $categry->name !!}</td>
            <td>
                {!! Form::open(['route' => ['categries.destroy', $categry->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('categries.show', [$categry->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('categries.edit', [$categry->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>