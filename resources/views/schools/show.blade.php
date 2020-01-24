@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-3">
                    <h1>School</h1>
                </div>
                <div class="col-sm-9">
                    <div class="float-sm-right  mt-2">
                    <a data-placement="top" data-toggle="tooltip" href="#btn_action_show_fields" data-original-title="School status: {{ $school->whatStatus() }}" class="badge badge-pill badge-{{ $school->whatStatusColors() }}" style="position: relative;top: -2px;left: 0;">{{ $school->whatStatus() }}</a>
                    &nbsp;/&nbsp;
                    <small><span class="text-muted">Permalink:</span>&nbsp;<a  target="_blank" style="text-decoration:underline" href="{{route('web.detail', $school->slug_sekolah)}}">{{route('web.detail', $school->slug_sekolah)}}</a></small>
                    </div>    
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="content">
        <div class="container-fluid form-horizontal">
            @include('schools.show_fields')
        </div>
    </div>
@endsection
