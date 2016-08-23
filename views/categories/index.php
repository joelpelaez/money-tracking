<h2>Categories list</h2>
<table class="table">
    <tr>
        <th>Name</th>
        <th>Action</th>
    </tr>
<?php foreach ($categories as $category): ?>
    <tr>
        <td><?php echo $category["name"]; ?></td>
        <td>
            <a href="<?php echo APP_URL; ?>categories/edit/<?php echo $category['id']; ?>">Edit</a>
            <a href="<?php echo APP_URL; ?>categories/delete/<?php echo $category['id']; ?>">Delete</a>
        </td>
    </tr>
<?php endforeach; ?>
</table>
<a href="<?php echo APP_URL; ?>categories/add" class="btn btn-default" role="button">Add New Category</a>