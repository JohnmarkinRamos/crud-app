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
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 6px 12px;
            text-decoration: none;
            border-radius: 4px;
            color: #fff;
            margin: 0;
            line-height: 1;
        }
        .btn-view { background: #2196F3; }
        .btn-edit { background: #FF9800; }
        .btn-delete { background: #f44336; border: none; cursor: pointer; }
        .btn-add { background: #4CAF50; padding: 8px 16px; }
        .action-buttons {
            display: flex;
            gap: 6px;
            align-items: center;
            flex-wrap: nowrap;
            white-space: nowrap;
        }
        .action-buttons form { margin: 0; }
        .action-buttons .btn { padding: 6px 10px; }
        .action-buttons .btn-delete { padding: 6px 10px; }
        .actions-cell { white-space: nowrap; }
        .alert { padding: 10px; background: #d4edda; color: #155724; border-radius: 4px; margin-bottom: 15px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 4px; font-weight: bold; }
        input, select { width: 100%; padding: 8px; box-sizing: border-box; }
        .error { color: red; font-size: 0.9em; }
        .dropdown-select { position: relative; }
        .dropdown-select summary {
            list-style: none;
            cursor: pointer;
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background: #fff;
            box-sizing: border-box;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }
        .dropdown-select summary::-webkit-details-marker { display: none; }
        .dropdown-select summary::after {
            content: '▾';
            font-size: 1rem;
            line-height: 1;
            color: #555;
        }
        .dropdown-select[open] summary::after { content: '▴'; }
        .dropdown-select-panel {
            position: absolute;
            z-index: 20;
            left: 0;
            right: 0;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background: #fff;
            max-height: 220px;
            overflow: auto;
            padding: 8px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        }
        .dropdown-select-option { display: flex; align-items: center; gap: 8px; padding: 6px 4px; }
        .dropdown-select-option input { width: auto; }
        .dropdown-select-placeholder { color: #666; }
        .dropdown-select-help { display:block; margin-top:6px; color:#666; }
        .subjects-dropdown { position: relative; display: inline-block; min-width: 160px; }
        .subjects-dropdown summary {
            list-style: none;
            cursor: pointer;
            padding: 6px 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background: #fdfdfd;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }
        .subjects-dropdown summary::-webkit-details-marker { display: none; }
        .subjects-dropdown summary::after {
            content: '▾';
            font-size: 0.95rem;
            color: #555;
        }
        .subjects-dropdown[open] summary::after { content: '▴'; }
        .subjects-dropdown-panel {
            position: absolute;
            z-index: 20;
            left: 0;
            top: calc(100% + 6px);
            min-width: 220px;
            max-width: 320px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background: #fff;
            padding: 8px 10px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        }
        .subjects-dropdown-item { display: block; padding: 4px 0; }
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