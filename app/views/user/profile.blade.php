@extends('layouts.master')
@section('content')

<h1>Your Profile</h1>
<hr>
<div class="row">
    <div class="col-md-6">
        <ul class="list-group">
            <li class="list-group-item"><h3>Username: {{ $user->username }}</h3></li>
            <li class="list-group-item"><h3>Name: {{ $user->full_name }}</h3></li>
            <li class="list-group-item"><h3>Email: {{ $user->email }}</h3></li>
        </ul>
        <a href="{{ URL::action('AccountController@profilePublic', [$user->username]) }}" class="btn btn-primary"><i class="fa fa-user"></i> View Public Profile</a>
        <a href="{{ URL::to('profile/edit') }}" class="btn btn-default pull-right"><i class="fa fa-edit"></i> Edit Profile</a>
    </div>

    <div class="col-md-6">
        <a href="{{ URL::to('users/'.$user->username) }}"><img src="{{ gravatar_url($user->email, 250) }}" alt="{{ $user->username }}"></a>
    </div>

</div>
@stop
