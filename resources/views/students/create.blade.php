<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Student</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        main {
            text-align: center;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            display: inline-block;
            text-align: left;
        }

        h1 {
            color: #333;
        }

        label {
            display: block;
            margin: 10px 0;
            color: #555;
        }

        input {
            width: calc(100% - 16px);
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: calc(100% - 16px);
        }

        button a {
            text-decoration: none;
            color: white;
        }

        button.back {
            background-color: #555;
            margin-top: 10px;
        }

        div.success {
            color: green;
            margin-bottom: 15px;
        }

        div.error {
            color: red;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    @if (Session::has('success'))
    <div class="success">{{ Session::get('success') }}</div>
    @endif

    <main>
        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h1>Add New Student</h1>

            <label for="name">Name:</label>
            <input type="text" name="name" value="{{ old('name') }}">

            @error("name")
            <div class="error">{{ $message }}</div>
            @enderror

            <label for="phone">Phone:</label>
            <input type="number" name="phone" value="{{ old('phone') }}">

            @error("phone")
            <div class="error">{{ $message }}</div>
            @enderror

            <label for="email">E-mail:</label>
            <input type="email" name="email" value="{{ old('email') }}">

            @error("email")
            <div class="error">{{ $message }}</div>
            @enderror

            <label for="section">Section:</label>
            <input type="text" name="section" value="{{ old('section') }}">

            @error("section")
            <div class="error">{{ $message }}</div>
            @enderror

            <label>Image:</label>
            <input type="file" name="image" value="{{ old('image') }}">

            @error("image")
            <div class="error">{{ $message }}</div>
            @enderror

            <button>Add New Student</button>
        </form>

        <button class="back"><a href="{{ route('students.index') }}">Back</a></button>
    </main>
</body>
</html>