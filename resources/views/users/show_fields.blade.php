<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">User Detail</h3>
    </div>
    <div class="card-body">
        <div class="card-body">
            <div class="row">
                    <div class="form-group form-group-sm col-sm-6">
                        <div class="row">
                            {!! Form::label('name', 'Name', ['class' => 'col-sm-3 col-form-label']) !!}
                            <div class="col-sm-9">
                            {!! Form::text('name', $user->name, ['class' => 'form-control', 'readonly']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-group-sm col-sm-6">
                        <div class="row">
                            {!! Form::label('email', 'Email', ['class' => 'col-sm-3 col-form-label']) !!}
                            <div class="col-sm-9">
                            {!! Form::text('email',  $user->email, ['class' => 'form-control', 'readonly']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-group-sm col-sm-6">
                        <div class="row">
                            {!! Form::label('role', 'Role', ['class' => 'col-sm-3 col-form-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::text('role',  $user->role, ['class' => 'form-control', 'readonly']) !!}
                            </div>
                        </div>
                    </div>
            </div>
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
                            {!! Form::text('akun_wa', $user->akun_wa, ['readonly', 'class' => 'form-control']) !!}
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
                            {!! Form::text('akun_facebook', $user->akun_facebook, ['readonly', 'class' => 'form-control']) !!}
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
                            {!! Form::text('akun_instagram', $user->akun_instagram, ['readonly', 'class' => 'form-control']) !!}
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
                            {!! Form::text('akun_telegram', $user->akun_telegram, ['readonly', 'class' => 'form-control']) !!}
                        </div>
                        <small class="text-muted"><em>Contoh: t.me/<strong>fulan</strong></em></small>
                    </div>
                </div>
            </div>

        </div>
    </div>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Timestamps</h3>
    </div>
    <div class="card-body">
        <div class="card-body">
            <div class="row">
                <!-- Created At Field -->
                <div class="form-group col-sm-6">
                    <div class="row">
                        {!! Form::label('created_at', 'Created At', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('campaign_id', \Carbon\Carbon::parse($user->created_at)->format('d M Y H:i:s'), ['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </div>
                </div>

                <!-- Updated At Field -->
                <div class="form-group col-sm-6">
                    <div class="row">
                        {!! Form::label('updated_at', 'Updated At', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('campaign_id', \Carbon\Carbon::parse($user->updated_at)->format('d M Y H:i:s'), ['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </div>
                </div>

                <!-- Created At Field -->
                <div class="form-group col-sm-6">
                    <div class="row">
                        {!! Form::label('created_by', 'Created By', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('campaign_id', !empty($user->creator)?$user->creator->name:'-', ['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </div>
                </div>

                <!-- Updated At Field -->
                <div class="form-group col-sm-6">
                    <div class="row">
                        {!! Form::label('updated_by', 'Updated By', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('campaign_id', !empty($user->editor)?$user->editor->name:'-', ['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <!-- Submit Field -->
            <div class="form-group col-sm-12 text-center">
                <a href="{!! route('users.index') !!}" class="btn btn-default">Back</a>
                <a href="{!! route('users.edit', $user->id) !!}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
</div>

