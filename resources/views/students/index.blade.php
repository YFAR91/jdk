<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Students</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        a {
            display: inline-block;
            background-color: #4caf50;
            color: white;
            padding: 10px;
            text-decoration: none;
            margin: 10px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #45a049;
        }

        a.edit {
            background-color: #2196F3;
        }

        a.edit:hover {
            background-color: #1e87d7;
        }

        form {
            display: inline-block;
            margin: 0;
        }

        button {
            display: inline-block;
            background-color: #f44336;
            color: white;
            padding: 10px;
            text-decoration: none;
            margin: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #d83025;
        }

        h3 {
            color: #555;
            margin-top: 20px;
        }

        /* Add additional styling as needed */
    </style>
</head>
<body>
    <h1>Students List</h1>
    <a href="{{ route('students.create') }}">Add New Student</a>

    @forelse ($data as $item)
        <div>
            <a href="{{ route('students.show', $item) }}">{{ $item->name }}</a>
            <a class="edit" href="{{ route('students.edit', $item) }}">Edit</a>
            <form action="{{ route("students.destroy", $item) }}" method="POST">
                @method("DELETE")
                @csrf
                <button type="submit">Remove</button>
            </form>
        </div>
    @empty
        <h3>No students available</h3>
    @endforelse
</body>
</html>
