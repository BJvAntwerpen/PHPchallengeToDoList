<table>
<?php foreach ($ToDoItems as $ToDoItem) { ?>
	<tr>
		<td><a class="delete" href="<?php echo URL . 'ToDoList/delete/' . $ToDoItem['ToDo_ID']; ?>">X</a></td>
		<td><p class="test"><?php echo $ToDoItem['ToDo_listItem'] ?></p></td>
		<td><a>View</a></td>
		<td><a class="edit" href="<?php echo URL . 'ToDoList/edit/' . $ToDoItem['ToDo_ID']; ?>">Edit</a></td>
	</tr>
<?php } ?>
</table>
<p><a href="<?= URL ?>ToDoList/create">Add new 'to do' item</a></p>