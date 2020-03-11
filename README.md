# REST API
## Response format:  
``success: null|array``  
``errors: null|string|array``

## Routes
### [GET] /api/tasks
Returns list of tasks

### [POST] /api/tasks
Parameters: ``task: string``  
Creates task

### [PUT] /api/tasks/{id}
Parameters: ``task: string``  
Updates task

### [DELETE] /api/tasks/{id}
Deletes task
