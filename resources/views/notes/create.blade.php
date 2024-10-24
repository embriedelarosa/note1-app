<!--create view page-->
<div>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS external link -->
        <link rel="stylesheet" href="{{ asset('css/create.css') }}">
        <title>Create Note</title>
    </head>
    <body>
        <div class="container">
            <h1>Create Note</h1>
            <form action="{{ route('notes.store') }}" method="POST">
                @csrf
                <!-- title field -->
                <div>
                    <input type="text" placeholder="Enter your note title here.." name="title" id="title" required maxlength="255">
                </div>
                <!-- content field -->
                <div>
                    <textarea name="content" placeholder="Enter your note content here.." id="content" rows="20" required maxlength="10000"></textarea>
                </div>
                <!-- save button -->
                <button type="submit" class="btn btn-success">Save</button>
                <!-- cancel button -->
                <a href="{{ route('notes.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </body>
    </html>
</div>


