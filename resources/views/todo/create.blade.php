@extends('layout.app')

@section('content')
<!-- Content -->
<div class="container">
  <form action="{{ route('todo.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card shadow-sm card-note bg-white">
      <h4 class="fw-bold">Share and Save Your Notes</h4>
      <p class="text-muted mb-4">Write down the things that are important to you</p>

      <div class="mb-3">
        <label class="form-label fw-semibold">Title</label>
        <input name="title" value="{{ old('title') }}" type="text" class="form-control rounded-pill" placeholder="Enter your title">
        @error('title')
        <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label class="form-label fw-semibold">Note</label>
        <textarea name="body" class="form-control" rows="5" placeholder="Write your note here...">{{ old('body') }}</textarea>
        @error('body')
        <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="btn btn-submit">Submit Note</button>
    </div>
  </form>
</div>
@endsection

