@extends('layouts.auth.admin.master')

@section('content')
    <section class="section">
      <div class="section-header">
        <h1>Room</h1>
      </div>
      <div class="section-body">
        <div class="card">
          <div class="card-header justify-content-between align-items-center">
            <h4>Room</h4>
            <a class="btn btn-primary" href="{{ route('admin.rooms.create') }}">Add</a>
          </div>
        <div class="card-body">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
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
    </section>
@endsection
