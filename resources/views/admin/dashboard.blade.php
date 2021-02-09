@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header mb-3">{{ __('Admin Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p><a href="{{ route('admin.users.index') }}" class="btn btn-primary btn-lg">Click Here to view users</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection