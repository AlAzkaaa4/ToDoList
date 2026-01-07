<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>To Do List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: radial-gradient(circle at top, #0f172a, #020617);
            color: #e5e7eb;
        }

        .container {
            max-width: 1100px;
            margin: 60px auto;
            background: #020617;
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 30px 60px rgba(0,0,0,.55);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        input, textarea {
            background: #020617;
            border: 1px solid #1e293b;
            color: #e5e7eb;
            border-radius: 10px;
            padding: 12px;
            width: 100%;
            box-sizing: border-box;
        }

        textarea {
            resize: none;
        }

        button {
            cursor: pointer;
            border: none;
            border-radius: 10px;
            font-weight: 600;
        }

        .btn-primary {
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            color: white;
            padding: 12px;
        }

        .todo-card {
            background: rgba(2, 6, 23, 0.9);
            border: 1px solid #1e293b;
            border-radius: 16px;
            padding: 18px;
            margin-bottom: 18px;
        }

        .todo-footer {
            display: flex;
            justify-content: space-between;
            margin-top: 14px;
            font-size: 13px;
            color: #94a3b8;
        }

        .done {
            text-decoration: line-through;
            color: #64748b;
        }

        .danger {
            color: #ef4444;
            background: none;
        }

        .success {
            color: #22c55e;
            background: none;
        }


        @media (max-width: 900px) {
            .dashboard {
                grid-template-columns: 1fr !important;
            }
        }
    </style>
</head>
<body>

<div class="container">
    @yield('content')
</div>

</body>
</html>
