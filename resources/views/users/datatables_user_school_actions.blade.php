{!! Form::open(['route' => ['schools.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('schools.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-eye"></i>
    </a>
    @php
        $school = \App\Models\School::find($id);
    @endphp

    @if(\App\Models\Role::isAdmin() || $school->isMySchool())
    <a href="{{ route('schools.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
    @endif
</div>
{!! Form::close() !!}
