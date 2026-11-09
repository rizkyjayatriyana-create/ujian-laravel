<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - Pendataan Siswa dan Kelas</title>
    <style>
        table, th, td { border: 1px solid black; border-collapse: collapse; padding: 5px; text-align: left; }
        label { display: block; }
        .form-group { margin-bottom: 10px; }
        .error-text, .alert-error { color: red; }
        .alert-success { color: green; }
        form.inline { display: inline; }
    </style>
</head>
<body>
    <h1>Aplikasi Pendataan Siswa dan Kelas</h1>

    <a href="{{ route('kelas.index') }}">Data Kelas</a> |
    <a href="{{ route('siswa.index') }}">Data Siswa</a>
    <hr>

    @if (session('success'))
        <p class="alert-success">{{ session('success') }}</p>
    @endif
    @if (session('error'))
        <p class="alert-error">{{ session('error') }}</p>
    @endif

    @yield('content')
</body>
</html>