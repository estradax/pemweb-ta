@extends('layouts.auth.admin.master')

@section('content')
    <section class="section">
      <div class="section-header">
        <h1>Reservation</h1>
      </div>
      <div class="section-body">
        <div class="card">
          <div class="card-header justify-content-between align-items-center">
            <h4>Create new reservation</h4>
          </div>
        <div class="card-body">
            <form action="{{ route('admin.reservations.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label>User</label>
                <select class="form-control select2 @error('user_id') is-invalid @enderror" name="user_id">
                    <option value="">Select...</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Room</label>
                <select class="form-control select2 @error('room_id') is-invalid @enderror" name="room_id">
                    <option value="">Select...</option>
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }}">{{ $room->public_id }} Cap. {{ $room->bed_count }}</option>
                    @endforeach
                </select>
                @error('room_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Day Count</label>
                <input type="number" name="day_count" class="form-control @error('day_count') is-invalid @enderror">
                @error('day_count')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button class="btn btn-primary">Submit</button>
            </form>
        </div>
        </div>
      </div>
    </section>
@endsection
