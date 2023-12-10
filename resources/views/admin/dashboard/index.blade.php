@extends('layouts.auth.admin.master')

@section('content')
   <section class="section">
      <div class="section-header">
        <h1>Dashboard</h1>
      </div>
      <div class="section-body">
        <div class="card">
          <div class="card-header">
            <h4>Reservation</h4>
          </div>
          <div class="card-body">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">ID</th>
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
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->user->name }} ({{ $reservation->user->id }})</td>
                    <td>{{ $reservation->room->public_id }} ({{ $reservation->room->id }})</td>
                    <td>{{ $reservation->day_count }}</td>
                    <td>{{ $reservation->total_price }}</td>
                    <td>
                      <a class="btn btn-primary" href="#">Edit</a>
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
        <div class="row">
         <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
              <div class="card-header">
                <h4>User</h4>
              </div>
              <div class="card-body">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">ID</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($users as $user)
                      <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                          <a class="btn btn-primary" href="#">Edit</a>
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
          <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
              <div class="card-header">
                <h4>Room</h4>
              </div>
              <div class="card-body">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">ID</th>
                      <th scope="col">Public ID</th>
                      <th scope="col">Bed Count</th>
                      <th scope="col">Price</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($rooms as $room)
                      <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $room->id }}</td>
                        <td>{{ $room->public_id }}</td>
                        <td>{{ $room->bed_count }}</td>
                        <td>{{ $room->price }}</td>
                        <td>
                          <a class="btn btn-primary" href="#">Edit</a>
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td align="center" colspan="100">No rooms</td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
