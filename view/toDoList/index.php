<table>
<?php foreach ($ToDoItems as $ToDoItem) { ?>
	<tr>
		<td class="delCell"><a class="delete" href="<?php echo URL . 'ToDoList/delete/' . $ToDoItem['ToDo_ID']; ?>">X</a></td>
		<td class="textCell"><p class="list"><?php echo $ToDoItem['ToDo_listItem'] ?></p></td>
		<td class="viewCell"><a class="view" href="<?php echo URL . 'TasksList/index/' . $ToDoItem['ToDo_ID'] ?>">View</a></td>
		<td class="editCell"><a class="edit" href="<?php echo URL . 'ToDoList/edit/' . $ToDoItem['ToDo_ID']; ?>">Edit</a></td>
	</tr>
<?php } ?>
</table>
<p><a href="<?= URL ?>ToDoList/create">Add new 'to do' list</a></p>