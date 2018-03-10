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
		<td class="delCell"><a class="delete" href="#">X</a></td>
		<td class="textCell"><p class="tasks"><?php echo $task['task_text']?></p></td>
		<td><p class="duration"><?php echo $task['task_duration']?></p></td>
		<td><p class="status"><?php echo $task['task_status']?></p></td>
		<td class="editCell"><a class="edit" href="#">edit</a></td>
	</tr>
<?php } ?>
</table>
<p class="last"><a href="<?= URL ?>TasksList/create">Add new task on the list</a></p>
<p class="last"><a href="<?= URL ?>TasksList/deleteAll">Clear the list</a></p>