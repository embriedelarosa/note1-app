<!--delete view page-->
<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
    <!--delete msg confirmation--> 
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.delete-note').forEach(button => {
            button.addEventListener('click', function(event) {
                /*if cancelled ni user ang deletion*/
                if (!confirm('Are you sure you want to delete this note?')) {
                    event.preventDefault();
                }
            });
        });
    });
</script>
</body>
</html>

