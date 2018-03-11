<?php $toDoID = $_SESSION['taskList']; ?>
<a href="<?php echo URL . 'TasksList/index/' . $toDoID ?>">Return</a>
<form method="POST" action="<?= URL ?>TasksList/createSave">
	<label>Task name</label><input type="text" name="taskName"><br>
	<label>Task duration</label><input type="text" name="taskDuration"><br>
	<label>Task status</label>
	<select name="taskStatus">
		<option value="0%">incomplete</option>
		<option value="0%-25%">0%-25%</option>
		<option value="25%-50%">25%-50%</option>
		<option value="50%-75%">50%-75%</option>
		<option value="75%-100%">75%-100%</option>
		<option value="100%">completed</option>
	</select><br>
	<input type="submit" value="Add this to the list">
	<input type="hidden" name="ToDoListId" value="<?= $toDoID ?>">
</form>