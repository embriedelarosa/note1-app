<!--main view page-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>
    <!-- calling out external CSS natin for design and responsiveness nitong index file-->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <!-- font awesome icons (pencil and trash) galing sa link na to-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<div class="header">
<!-- para mainherit layout.blade.php attributes (deletion) -->
@extends('layout')

@section('content')
<!-- MSG pag success yung delete or update -->
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<!-- class - calling the css style -->
<div class="header">
    <h1>My Notes</h1>
    <!--redirected to "create.blade.php" once clicked ang + icon-->
    <a href="{{ route('notes.create') }}" class="add-note-btn">+</a>
</div>

<h2 class="recent-notes">Recent Notes</h2>

<div class="notes-scroll-wrapper">
    <div class="notes-scroll-container">
        <!-- sortByDesc - mauuna sa note list yung latest created note-->
        @foreach ($notes->sortByDesc('created_at') as $note)
            <!-- note-card = note container-->
            <div class="note-card">
                <div class="note-header">
                    <!-- cinall out yung created_at sa database para mashow yung date when crineate-->
                    <span class="note-date">{{ $note->created_at->format('d/m/y') }}</span>
                    <!--note actions yung edit/update and delete-->
                    <div class="note-actions">
                        <!--parameter yung $note->id para malaman if ano yung ieedit based sa id sa loob ng database -->
                        <!--title yan lang yung mag aappear na text pag tinapat yung cursor sa specific place-->
                        <a href="{{ route('notes.edit', $note->id) }}" title="Click to edit this note">
                            <!--ito yung icon na galing sa link don sa taas kasunod ng external link ng file-->
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <!-- gagana tong section na to once confirmed na kay layout.blade.php (deletion na js) sa taas kung idedelete yung specific note-->
                        <form action="{{ route('notes.destroy', $note->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-note" title="Click to delete this note">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <!-- shinow lang dito yung title-->
                <h2>{{ \Illuminate\Support\Str::limit($note->title, 30) }}</h2>
                <!-- ito limit lang ng desc kung ilan lang magsshow na character, binase ko sa laki ng note container-->
                <p>{{ \Illuminate\Support\Str::limit($note->content, 360) }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection
