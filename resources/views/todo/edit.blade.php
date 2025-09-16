@extends('layout.app')

@section('content')
<!-- Content -->
<div class="container">
  <form action="{{ route('todo.update', $todo->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card shadow-sm card-note bg-white">
      <h4 class="fw-bold">Share and Save Your Notes</h4>
      <p class="text-muted mb-4">Write down the things that are important to you</p>

      <div class="mb-3">
        <label class="form-label fw-semibold">Title</label>
        <input name="title" value="{{ old('title', $todo->title) }}" type="text" class="form-control rounded-pill" placeholder="Enter your title">
        @error('title')
        <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label class="form-label fw-semibold">Note</label>
        <textarea name="body" class="form-control" rows="5" placeholder="Write your note here...">{{ old('body', $todo->body) }}</textarea>
        @error('body')
        <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="btn btn-submit">Update Note</button>
    </div>
  </form>
</div>
@endsection

