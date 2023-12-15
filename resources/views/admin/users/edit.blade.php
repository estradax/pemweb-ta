@extends('layouts.auth.admin.master')

@section('content')
    <section class="section">
      <div class="section-header">
        <h1>User</h1>
      </div>
      <div class="section-body">
        <div class="card">
          <div class="card-header justify-content-between align-items-center">
            <h4>Edit user {{ $user->email }}</h4>
          </div>
        <div class="card-body">
            <form action="{{ route('admin.users.update', $user->id) }}" method="post">
            @csrf
            <div class="form-group">
              <label>Name</label>
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}">
                @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
                @enderror
            </div>

            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" value="{{ $user->email }}" disabled>
            </div>

            <div class="form-group">
              <div class="control-label">Admin</div>
              <label class="custom-switch mt-2">
                <input type="checkbox" name="is_admin" class="custom-switch-input" @if ($user->is_admin) checked @endif>
                <span class="custom-switch-indicator"></span>
                <span class="custom-switch-description">Switch to admin</span>
              </label>
            </div>

            <button class="btn btn-primary">Submit</button>
            </form>
        </div>
        </div>
      </div>
    </section>
@endsection
