<?php $toDoID = $_SESSION['taskList']; ?>
<a href="<?php echo URL . 'TasksList/index/' . $toDoID ?>">Return</a>
<form method="POST" action="<?= URL ?>TasksList/editSave">
	<label>Task name</label><input type="text" name="taskName" value="<?= $task['task_text'] ?>"><br>
	<label>Task duration</label><input type="text" name="taskDuration" value="<?= $task['task_duration'] ?>"><br>
	<label>Task status</label>
	<select name="taskStatus">
		<option <?php if ($task['task_status'] == '0%') { echo 'selected'; } ?> value="0%">0%</option>
		<option <?php if ($task['task_status'] == '0%-25%') { echo 'selected'; } ?> value="0%-25%">0%-25%</option>
		<option <?php if ($task['task_status'] == '25%-50%') { echo 'selected'; } ?> value="25%-50%">25%-50%</option>
		<option <?php if ($task['task_status'] == '50%-75%') { echo 'selected'; } ?> value="50%-75%">50%-75%</option>
		<option <?php if ($task['task_status'] == '75%-100%') { echo 'selected'; } ?> value="75%-100%">75%-100%</option>
		<option <?php if ($task['task_status'] == '100%') { echo 'selected'; } ?> value="100%">100%</option>
	</select><br>
	<label>Change the list it belongs to</label>
	<select name="ToDoListId">
	<?php foreach($toDoLists as $toDoList) { ?>
		<option <?php if ($toDoList['ToDo_ID'] == $task['ToDo_ID']) { echo 'selected'; } ?> value="<?= $toDoList['ToDo_ID'] ?>"> <?= $toDoList['ToDo_listItem'] ?> </option>
	<?php } ?>
	</select><br>
	<input type="submit" value="Change the task">
	<input type="hidden" name="id" value="<?= $task['task_ID'] ?>">
</form>