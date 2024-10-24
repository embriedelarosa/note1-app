<!--edit/update view page-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}"> <!-- Include your new CSS -->
    <title>Edit Note</title>
</head>
<body>
@extends('layout')

@section('content')
<div class="container">
    <h1>Edit Note</h1>

    <form action="{{ route('notes.update', $note->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <input type="text" name="title" id="title" value="{{ $note->title }}" required placeholder="Enter title">
        </div>

        <div class="form-group">
            <textarea name="content" id="content" required placeholder="Enter note content">{{ $note->content }}</textarea>
        </div>

        <div class="button-group">
            <button type="submit" class="btn btn-success">Update</button>
            <!-- Cancel button -->
            <a href="{{ route('notes.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
</body>
@endsection




