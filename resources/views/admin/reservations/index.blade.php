@extends('layouts.auth.admin.master')

@section('content')
    <section class="section">
      <div class="section-header">
        <h1>Reservation</h1>
      </div>
      <div class="section-body">
        <div class="card">
          <div class="card-header justify-content-between align-items-center">
            <h4>Reservation</h4>
            <a class="btn btn-primary" href="{{ route('admin.reservations.create') }}">Add</a>
          </div>
          <div class="card-body">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">User</th>
                  <th scope="col">Room</th>
                  <th scope="col">Day Count</th>
                  <th scope="col">Total Price</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($reservations as $reservation)
                  <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $reservation->user->name }} ({{ $reservation->user->id }})</td>
                    <td>{{ $reservation->room->public_id }} ({{ $reservation->room->id }})</td>
                    <td>{{ $reservation->day_count }}</td>
                    <td>{{ $reservation->total_price }}</td>
                    <td>
                      <a class="btn btn-primary" href="{{ route('admin.reservations.edit', $reservation->id) }}">Edit</a>
                      <a class="btn btn-danger" href="{{ route('admin.reservations.destroy', $reservation->id) }}">Delete</a>
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
