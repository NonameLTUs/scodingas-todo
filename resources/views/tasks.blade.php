<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>To-do list</title>
</head>
<body>
<div id="error"></div>
<form id="create_task">
    <input type="text" min="3" max="255" placeholder="Task" required/>
    <button type="submit">Create</button>
</form>
<table border="1">
    <thead>
    <tr>
        <th>Name</th>
        <th>#</th>
    </tr>
    </thead>
    <tbody></tbody>
</table>

<script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous">
</script>
<script>
    $(document).ready(() => {
        const fetchTasks = () => {
            $.get('/api/tasks')
                .then(response => {
                    if (response.error) {

                    }

                    $('tbody').html(null);
                    for (let i in response.data) {
                        const task = response.data[i];
                        $('table').append(`<tr><td>${task.task}</td><td><button data-id="${task.id}" data-action="edit">Edit</button><button data-id="${task.id}" data-action="delete">Delete</button></td></tr>`);
                    }
                });
        };

        fetchTasks();

        const createTask = () => {
            const task = $('form#create_task > input').val();
            $.post('/api/tasks', {task: task})
                .then(response => {
                    if (response.error) {

                        return;
                    }

                    fetchTasks();
                });
        };

        $('form#create_task').submit(e => {
            e.preventDefault();
            createTask();
        })
    });
</script>
</body>
</html>
