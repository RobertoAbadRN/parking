<!DOCTYPE html>
<html>
<head>
    <title>Error</title>
</head>
<body>
    <h1>Error</h1>
    <p>{{ $message }}</p>
</body>


<!-- resources/views/sweet_alert.blade.php -->
<script src="path/to/sweetalert.min.js"></script>

<script>
    swal.fire({
        icon: 'error',
        title: 'Error',
        text: '{{ $message }}',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '{{ route('login') }}';
        }
    });
</script>


</html>
