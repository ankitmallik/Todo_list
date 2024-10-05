
<script>
    // Function to handle the update of the task name
    function updateTask() {
        const newTaskName = document.getElementById('editTaskInput').value;
        if (newTaskName.trim() === "") {
            alert("Please enter a valid task name.");
            return;
        }

        // Example AJAX call (you'll need to implement this in your backend)
        fetch(`/tasks/update`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-Token': '{{ csrf_token() }}' // Include CSRF token for security
                },
                body: JSON.stringify({
                    task: newTaskName
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Task updated successfully!");
                    location.reload(); // Reload the page or update the UI
                } else {
                    alert("Error updating task.");
                }
            })
            .catch(error => console.error('Error:', error));
    }

    // Function to handle the back action
    function goBack() {
        // Implement your back logic here, for example:
        document.getElementById('editTaskInput').value = ''; // Clear the input field
    }

    // Show/hide the status menu on clicking the menu button
    document.querySelectorAll('.menu').forEach(menuBtn => {
        menuBtn.addEventListener('click', function() {
            let menu = this.nextElementSibling; // Get the associated status menu
            menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
        });
    });

    // Hide the status menu after selecting a status
    function updateStatus(url) {
        // Perform the status update (redirect to the status update route)
        window.location.href = url;

        // Hide all status menus
        document.querySelectorAll('.status-menu').forEach(menu => {
            menu.style.display = 'none';
        });
    }

    // Hide status menu when clicking outside
    document.addEventListener('click', function(event) {
        if (!event.target.closest('.task-actions')) {
            document.querySelectorAll('.status-menu').forEach(menu => {
                menu.style.display = 'none';
            });
        }
    });
</script>
