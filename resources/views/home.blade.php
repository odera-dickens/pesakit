@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header mb-3">{{ __('My Dashboard') }}</div>
                <div class="card-title text-center text-uppercase">Profile</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table">
                        <table class="table-responsive table-stripped">
                            @if(isset($user))
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
                            <tbody>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->role }}</td>
                                <td class="btn-group btn-group-sm">
                                    <a href="#" class="btn btn-primary btn-lg">Edit</a>
                                </td>
                            </tbody>
                            @endif
                        </table>
                    </div>    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection