@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header mb-3">{{ __('Admin Dashboard') }}</div>
                <div class="card-title text-center text-uppercase">Users</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table">
                        <table class="table-responsive table-stripped">
                            @if(isset($users))
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @foreach($users  as $user)
                                <tbody>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td><a href="{{ route('admin.user.profile',['user'=> $user->id ]) }}" class="btn btn-primary btn-lg">View</a></td>
                                </tbody>
                            @endforeach
                            @endif
                        </table>
                    </div>    
                    <a href="{{ route('admin.dashboard')}}" class="btn btn-lg btn-success">Go To Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection