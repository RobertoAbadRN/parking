<!-- resources/views/sweet_alert.blade.php -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // SweetAlert2 code here
        Swal.fire({
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
    });
</script>

