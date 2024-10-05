<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ url('addStyle.css') }}">
</head>

<body>
    <div>
        <h1>To-Do Task Management</h1>
        <div class="hr"></div>
        <form action="{{ route('add.todo') }}" method="post">
            @csrf
            <div class="add-task">
                <h6>Add a New Task</h6>
                <input type="text" name="task">
                @error('task')
                    <span class="message">{{ $message }}</span>
                @enderror
                <button type="submit" class="add-button">ADD</button>
            </div>
            {{-- <div class="flex items-center justify-center mt-1">
                <button class="go-back">Go Back</button>
            </div> --}}
        </form>
    </div>
</body>

</html>
