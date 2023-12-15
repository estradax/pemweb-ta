@extends('layouts.auth.admin.master')

@section('content')
    <section class="section">
      <div class="section-header">
        <h1>User</h1>
      </div>
      <div class="section-body">
        <div class="card">
          <div class="card-header">
            <h4>User</h4>
          </div>
          <div class="card-body">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Role</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($users as $user)
                  <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>@if ($user->is_admin) Admin @else User @endif</td>
                    <td>
                      <a class="btn btn-primary" href="{{ route('admin.users.edit', $user->id) }}">Edit</a>
                      <a class="btn btn-danger" href="{{ route('admin.users.destroy', $user->id) }}">Delete</a>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td align="center" colspan="100">No users</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
@endsection
