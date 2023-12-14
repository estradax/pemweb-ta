@extends('layouts.auth.admin.master')

@section('content')
    <section class="section">
      <div class="section-header">
        <h1>Room</h1>
      </div>
      <div class="section-body">
        <div class="card">
          <div class="card-header justify-content-between align-items-center">
            <h4>Create new room</h4>
          </div>
        <div class="card-body">
            <form action="{{ route('admin.rooms.store') }}" method="post">
            @csrf
            <div class="form-group">
              <label>Public ID</label>
              <input type="text" name="public_id" class="form-control @error('public_id') is-invalid @enderror">
                @error('public_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
                @enderror

            </div>
            <div class="form-group">
              <label>Bed Count</label>
              <input type="number" name="bed_count" class="form-control @error('bed_count') is-invalid @enderror">
                @error('bed_count')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
                @enderror
            </div>
            <div class="form-group">
              <label>Price</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    $
                  </div>
                </div>
                <input type="text" name="price" class="form-control currency @error('price') is-invalid @enderror">

              </div>
@error('price')
            <div class="invalid-feedback d-block">
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
