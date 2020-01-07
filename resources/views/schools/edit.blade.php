@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>School</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
   </section>
   <div class="content">
       <div class="container-fluid">
            @include('adminlte-templates::common.errors')
            {!! Form::model($school, ['route' => ['schools.update', $school->id], 'method' => 'patch', 'class' => 'form-horizontal dropzone', 'files' => true, 'autocomplete' => "autocomplete_off_hack_xfr4!k", 'id' => 'myForm']) !!}
            @include('schools.fields', ['pageType' => 'edit'])
            {!! Form::close() !!}
       </div>
   </div>
@endsection
