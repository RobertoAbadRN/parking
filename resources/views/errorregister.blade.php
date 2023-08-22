<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Status</title>
    <!-- Agrega aquí tus enlaces a los archivos CSS de Tailwind CSS u otros estilos -->

    <!-- Agrega el enlace al CSS de SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
</head>
<body>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white p-6 rounded shadow-md">
            <h1 class="text-2xl font-semibold mb-4">Registration Status</h1>
            @if(session('success') || session('error'))
                <p class="mb-4">{{ session('success') ?: session('error') }}</p>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
                <script>
                    // Muestra la alerta de SweetAlert2 y redirige al login
                    Swal.fire({
                        icon: '{{ session('success') ? 'success' : 'error' }}',
                        title: '{{ session('success') ? 'Registration Successful' : 'Error Registering' }}',
                        text: '{{ session('success') ?: session('error') }}',
                        confirmButtonText: 'Go to Login'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '{{ route('login') }}';
                        }
                    });
                </script>
            @endif
        </div>
    </div>
</body>
</html>
