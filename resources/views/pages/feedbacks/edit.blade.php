@extends('layout.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mt-5" style="color: rgb(150, 95, 24);">
                    <li class="breadcrumb-item"><a href="/" style="color: rgb(150, 95, 24);">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('developers.index') }}" style="color: rgb(150, 95, 24);">Developer</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('projects.index') }}" style="color: rgb(150, 95, 24);">Project</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('tasks.index') }}" style="color: rgb(150, 95, 24);">Task</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('feedbacks.index') }}" style="color: rgb(150, 95, 24);">Feedback</a></li>
                </ol>
            </nav>
            <h2 class="mt-5 mb-5">{{$feedbacks->name}}</h2>
            <div class="card">
                <div class="card-header bg-blue">
                    <h4 class="mb-0 text-black">Edit Feedback</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('feedbacks.update', $feedbacks->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="comment" class="form-label">Comment</label>
                            <textarea class="form-control @error('comment') is-invalid @enderror" id="comment" name="comment" rows="3" placeholder="Enter comment">{{ $feedbacks->comment }}</textarea>
                            @error('comment')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="reviewer" class="form-label">Reviewer</label>
                            <input type="text" class="form-control @error('reviewer') is-invalid @enderror" id="reviewer" name="reviewer" placeholder="Enter reviewer" value="{{ $feedbacks->reviewer }}">
                            @error('reviewer')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="attachments" class="form-label">Attachments</label>
                            <input type="text" class="form-control @error('attachments') is-invalid @enderror" id="attachments" name="attachments" placeholder="Enter attachments" value="{{ $feedbacks->attachments }}">
                            @error('attachments')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating</label>
                            <input type="number" class="form-control @error('rating') is-invalid @enderror" id="rating" name="rating" placeholder="Enter rating" value="{{ $feedbacks->rating }}">
                            @error('rating')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="feedback" class="form-label">Feedback</label>
                            <select class="form-select @error('feedback') is-invalid @enderror" id="feedback" name="feedback">
                                <option value="positive" {{ $feedbacks->feedback == 'positive' ? 'selected' : '' }}>Positive</option>
                                <option value="negative" {{ $feedbacks->feedback == 'negative' ? 'selected' : '' }}>Negative</option>
                                <option value="neutral" {{ $feedbacks->feedback == 'neutral' ? 'selected' : '' }}>Neutral</option>
                            </select>
                            @error('feedback')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="task_id" class="form-label">Task</label>
                            <select class="form-select @error('task_id') is-invalid @enderror" id="task_id" name="task_id">
                                @foreach($tasks as $task)
                                    <option value="{{ $task->id }}" {{ $feedbacks->task_id == $task->id ? 'selected' : '' }}>{{ $task->name }}</option>
                                @endforeach
                            </select>
                            @error('task_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Update Feedback</button>
                            <a href="{{ route('feedbacks.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
