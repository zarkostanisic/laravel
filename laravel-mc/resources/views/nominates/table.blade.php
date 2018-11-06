<table class="table table-responsive" id="nominates-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Gender</th>
        <th>Linkedin Url</th>
        <th>Bio</th>
        <th>Business Name</th>
        <th>Reason For Nomination</th>
        <th>No Of Nominations</th>
        <th>Is Admin Selected</th>
        <th>Is Won</th>
        <th>User Id</th>
        <th>Category Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($nominates as $nominate)
        <tr>
            <td>{!! $nominate->name !!}</td>
            <td>{!! $nominate->gender !!}</td>
            <td>{!! $nominate->linkedin_url !!}</td>
            <td>{!! $nominate->bio !!}</td>
            <td>{!! $nominate->business_name !!}</td>
            <td>{!! $nominate->reason_for_nomination !!}</td>
            <td>{!! $nominate->no_of_nominations !!}</td>
            <td>{!! $nominate->is_admin_selected !!}</td>
            <td>{!! $nominate->is_won !!}</td>
            <td>{!! $nominate->user_id !!}</td>
            <td>{!! $nominate->category_id !!}</td>
            <td>
                {!! Form::open(['route' => ['nominates.destroy', $nominate->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('nominates.show', [$nominate->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('nominates.edit', [$nominate->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>