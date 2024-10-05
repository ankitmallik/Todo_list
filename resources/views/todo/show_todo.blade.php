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
</head>

<body>
    <div class="container">
        <header class="header">
            <h1>Task Management</h1>
        </header>

        <main class="main">
            <h2>To-Do Task Management</h2>

            <div class="task-header" style="display: flex;justify-content: space-between">
                <div>
                    <span>In progress ({{ count($fetch->where('status', 'In Progress')) }})</span>
                </div>

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
                            <h3>{{ $task->task }}</h3>
                            <span class="status {{ strtolower($task->status) }}">
                                {{ $task->status }}
                            </span>
                        </div>
                        <div class="task-actions">
                            <a href="{{ route('edit.todo', $task->id) }}">
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
                                <button class="pending-text"
                                    onclick="updateStatus('{{ route('update.status', ['id' => $task->id, 'status' => 'Pending']) }}')">Pending</button>
                                <button class="in_progress"
                                    onclick="updateStatus('{{ route('update.status', ['id' => $task->id, 'status' => 'In Progress']) }}')">In
                                    Progress</button>
                                <button class="completed-text"
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
