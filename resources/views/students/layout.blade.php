<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 900px; margin: 40px auto; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #f4f4f4; }
        .btn { padding: 6px 12px; text-decoration: none; border-radius: 4px; color: #fff; margin-right: 4px; }
        .btn-view { background: #2196F3; }
        .btn-edit { background: #FF9800; }
        .btn-delete { background: #f44336; border: none; cursor: pointer; }
        .btn-add { background: #4CAF50; padding: 8px 16px; }
        .alert { padding: 10px; background: #d4edda; color: #155724; border-radius: 4px; margin-bottom: 15px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 4px; font-weight: bold; }
        input, select { width: 100%; padding: 8px; box-sizing: border-box; }
        .error { color: red; font-size: 0.9em; }
    </style>
</head>
<body>
    <h1>Student Management</h1>
    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif
    @yield('content')
</body>
</html>