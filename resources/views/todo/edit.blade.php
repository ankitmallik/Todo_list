<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do Task Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ url('style.css') }}">
    <style>

    </style>
</head>

<body>
    <div class="container">
        <header class="header">
            <h1>Task Management</h1>
        </header>

        <main class="main">
            <h2>To-Do Task Management</h2>

            <div class="task-header" style="display: flex;justify-content: space-between;">
                <div>
                    <span>In progress ({{ count($fetch->where('status', 'In Progress')) }})</span>
                </div>
                <!-- Input field for editing tasks -->
                <form action="{{ route('update.task', $data->id) }}" method="post">
                    @csrf
                    <div style="flex-grow: 1;display:flex;">
                        <input style="width: 90%; " name="task" type="text" id="editTaskInput"
                            value="{{ $data->task }}" class="edit-input" placeholder="Edit Task" />
                            @error('task')
                            <span class="message">{{ $message }}</span>
                        @enderror
                        <button class="icon-button">
                            <a href="{{ route('show.todo') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-arrow-left back-btn">
                                    <path d="m12 19-7-7 7-7" />
                                    <path d="M19 12H5" />
                                </svg>
                            </a>
                        </button>
                        <button class="icon-button" onclick="updateTask()">

                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-check success-btn">
                                <path d="M20 6 9 17l-5-5" />
                            </svg>
                        </button>
                    </div>
                </form>
                <!-- Back and Update icons -->
                <div style="justify-self: flex-end">


                    <a href="{{ route('home') }}">
                        <button class="add-task">+ Add new task</button>
                    </a>
                </div>
            </div>

            <div class="task-list">
                @foreach ($fetch as $task)
                    <div class="task-card">
                        <div class="task-details">
                            <h3 style="margin: 9px 0px">{{ $task->task }}</h3>
                            <span style="margin-top: 8px;" class="status {{ strtolower($task->status) }}">
                                {{ $task->status }}
                            </span>
                        </div>
                        <div class="task-actions">
                            <a href="{{ route('edit.todo', $task->id) }}" class="edit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-pencil pencil-btn">
                                    <path
                                        d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
                                    <path d="m15 5 4 4" />
                                </svg>
                            </a>
                            <button class="delete">
                                <a href="{{ route('delete.todo', $task->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-trash delete-btn">
                                        <path d="M3 6h18" />
                                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                    </svg>
                                </a>
                            </button>
                            <button class="menu">•••</button>
                            <div class="status-menu">
                                <button class="pending"
                                    onclick="updateStatus('{{ route('update.status', ['id' => $task->id, 'status' => 'Pending']) }}')">Pending</button>
                                <button
                                    onclick="updateStatus('{{ route('update.status', ['id' => $task->id, 'status' => 'In Progress']) }}')">In
                                    Progress</button>
                                <button
                                    onclick="updateStatus('{{ route('update.status', ['id' => $task->id, 'status' => 'Completed']) }}')">Completed</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </main>
    </div>

    @include('layouts.script');
</body>

</html>
