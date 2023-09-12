<!DOCTYPE html>
<html>
<head>
    <title>Error</title>
</head>
<body>
    <h1>Error</h1>
    <p>{{ $message }}</p>
</body>

 <!-- SweetAlert CDN -->
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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
