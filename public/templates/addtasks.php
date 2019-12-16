<div class="front form">
    <form action="processadd.php" method="post">
        <input type="date" name="duedateinput" placeholder="due date" required>
        <input type="text" name="taskinput" placeholder="task" required>
        <input type="text" name="taskdetailsinput" placeholder="details" required>
        <button type="submit" name="createtodo">Add task</button>
    </form>
    <form action='templates/updateform.php'>
        <button>Modify tasks</button>
    </form>
</div>