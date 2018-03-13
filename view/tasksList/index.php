<?php $_SESSION['taskList'] = $todolistname['ToDo_ID']; ?>
<p><a href="<?= URL ?>ToDoList">&#60;&#60;&#60; Return to the lists</a></p>
<h1>Tasks for '<?= $todolistname['ToDo_listItem'] ?>'</h1>
<table>
	<tr>
		<td class="delCell">delete</td>
		<td class="textCell">task name</td>
		<td>task duration</td>
		<td>task status</td>
		<td class="editCell">edit</td>
	</tr>
<?php foreach($tasks as $task) { ?>
	<tr>
		<td class="delCell"><a class="delete" href="<?php echo URL . 'TasksList/delete/' . $task['task_ID'] ?>">X</a></td>
		<td class="textCell"><p class="tasks"><?php echo $task['task_text']?></p></td>
		<td><p class="tasks"><?php echo $task['task_duration']?></p></td>
		<td><p class="tasks"><?php echo $task['task_status']?></p></td>
		<td class="editCell"><a class="edit" href="<?php echo URL . 'TasksList/edit/' . $task['task_ID'] ?>">edit</a></td>
	</tr>
<?php } ?>
</table>
<p class="last"><a href="<?= URL ?>TasksList/create">Add new task on the list</a></p>
<p class="last"><a href="<?php echo URL . 'TasksList/deleteAll/' . $todolistname['ToDo_ID'] ?>">Clear the list</a></p>