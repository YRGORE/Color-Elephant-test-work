@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}" files="true" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cover_letter') ? ' has-error' : '' }}">
                            <label for="cover_letter" class="col-md-4 control-label">Cover Letter</label>

                            <div class="col-md-6">
                                <textarea id="cover_letter" type="textarea" rows="5" class="form-control" name="cover_letter" value="{{ old('cover_letter') }}" required autofocus> </textarea>

                                @if ($errors->has('cover_letter'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cover_letter') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('resume') ? ' has-error' : '' }}">
                            <label for="resume" class="col-md-4 control-label">Upload Resume</label>

                            <div class="col-md-6">
                                <input type="file" id="resume" name="resume" accept=".pdf,.doc"/>

                                @if ($errors->has('resume'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('resume') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('resume') ? ' has-error' : '' }}">
                            <label for="likeWorking" class="col-md-4 control-label">Do You Like Working</label>

                            <div class="col-md-6">
                                <label class="radio-inline">
                                <input class="visibleTo" name="visibleTo" id="valueTo" value="1" type="radio" checked>Yes
                                </label>
                                <label class="radio-inline">
                                <input class="visibleTo" name="visibleTo" id="valueTo" value="0" type="radio"> No
                                </label>   
                            </div>
                        </div>

                        <div>{{ app('captcha')->display(); }}</div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection