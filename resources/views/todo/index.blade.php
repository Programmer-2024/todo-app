@extends('layout.app')

@section('content')
<!-- Content -->
<div class="container mt-4">
  <div class="text-center">
    <h4 class="fw-bold">Yeah, Here's your note ✨🎉</h4>
    <p class="text-muted">This record will be deleted 1x24 hours after you submit unless you have an account</p>
  </div>

  <!-- Search -->
  <div class="search-bar position-relative">
    <input type="text" class="form-control" value="Belajar Koding">
    <span class="input-group-text"><i class="bi bi-search"></i></span>
  </div>

  <!-- Note Card -->
    @forelse($todos as $todo)
  <div class="card shadow-sm note-card">
    <div class="card-body">
      <div class="d-flex align-items-center mb-2">
        <img src="https://cdn-icons-png.flaticon.com/512/1827/1827272.png" width="32" class="me-2">
        <div>
          <div class="fw-bold">{{ $todo->title }}</div>
          <small class="text-muted">{{ $todo->created_at->diffForHumans() }}</small>
        </div>
      </div>
      <div class="mb-3">
        {{ $todo->body }}
      </div>
      <div class="note-actions">
        <form class="left" action="{{ route('todo.destroy', $todo->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
          @csrf  
          @method('DELETE')        
          <button type="submit" class="btn">
            <i class="bi bi-trash me-1"></i> Delete
          </button>
        </form>
        <div class="right">
          <a href="#"><i class="bi bi-pencil me-1"></i>Edit</a>
          <a href="#"><i class="bi bi-share me-1"></i>Share</a>
        </div>
      </div>
    </div>
  </div>
  @empty
  <div class="text-center">
    Belum Ada Data
  </div>
  @endforelse

</div>
@endsection