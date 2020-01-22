<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Global</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="form-group form-group-sm col-sm-6">
                <div class="row">
                    {!! Form::label('name', 'Name', ['class' => 'col-sm-3 col-form-label']) !!}
                    <div class="col-sm-9">
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group form-group-sm col-sm-6">
                <div class="row">
                    {!! Form::label('email', 'Email', ['class' => 'col-sm-3 col-form-label']) !!}
                    <div class="col-sm-9">
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group form-group-sm col-sm-6">
                <div class="row">
                    {!! Form::label('password', 'Password', ['class' => 'col-sm-3 col-form-label']) !!}
                    <div class="col-sm-9">
                    {!! Form::password('password', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            @if(\App\Models\Role::isAdmin())
            <div class="form-group form-group-sm col-sm-6">
                <div class="row">
                    {!! Form::label('role', 'Role', ['class' => 'col-sm-3 col-form-label']) !!}
                    <div class="col-sm-9">
                        {!! Form::select('role', ['Admin' => 'Admin', 'Contributor' => 'Contributor'], null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            @else
            {!! Form::hidden('role', $user->role, ['class' => 'form-control']) !!}
            @endif
        </div>
    </div>
</div>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Social Media</h3>
    </div>
    <div class="card-body">
        <div class="row">
        
            <div class="form-group form-group-sm col-sm-6">
                <div class="row">
                    {!! Form::label('akun_wa', 'Nomor WA', ['class' => 'col-sm-3 col-form-label']) !!}
                    <div class="col-sm-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">+62</span>
                            </div>
                            {!! Form::text('akun_wa', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group form-group-sm col-sm-6">
                <div class="row">
                    {!! Form::label('akun_facebook', 'Akun Facebook', ['class' => 'col-sm-3 col-form-label']) !!}
                    <div class="col-sm-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">facebook.com/</span>
                            </div>
                            {!! Form::text('akun_facebook', null, ['class' => 'form-control']) !!}
                        </div>
                        <small class="text-muted"><em>Contoh: facebook.com/<strong>fulan</strong></em></small>
                    </div>
                </div>
            </div>
            <div class="form-group form-group-sm col-sm-6">
                <div class="row">
                    {!! Form::label('akun_instagram', 'Akun Instagram', ['class' => 'col-sm-3 col-form-label']) !!}
                    <div class="col-sm-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">instagram.com/</span>
                            </div>
                            {!! Form::text('akun_instagram', null, ['class' => 'form-control']) !!}
                        </div>
                        <small class="text-muted"><em>Contoh: instagr.am/<strong>fulan</strong></em></small>
                    </div>
                </div>
            </div>

            <div class="form-group form-group-sm col-sm-6">
                <div class="row">
                    {!! Form::label('akun_telegram', 'Akun Telegram', ['class' => 'col-sm-3 col-form-label']) !!}
                    <div class="col-sm-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">t.me/</span>
                            </div>
                            {!! Form::text('akun_telegram', null, ['class' => 'form-control']) !!}
                        </div>
                        <small class="text-muted"><em>Contoh: t.me/<strong>fulan</strong></em></small>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="card-footer">
        <div class="row">
            <!-- Submit Field -->
            <div class="form-group col-sm-12 text-center">
                <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script>
        $(document).ready(function(e){


        });

        document.getElementById('akun_wa').addEventListener('keyup',function(evt){
            var phoneNumber = document.getElementById('akun_wa');
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            phoneNumber.value = phoneNumber.value.replace(/^(\d{3})(\d{4})(\d)+$/, "$1-$2-$3");
        });
    </script>
@endsection
