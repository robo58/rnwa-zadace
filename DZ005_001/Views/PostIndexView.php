<h1>Posts</h1>

<?php
/** @var $data */
//print_r($data);
?>

  <div style="overflow-x:auto;">
    <table class="table">
        <tr>
            <th>#</th>
            <th>Sadržaj</th>
            <th>Autor</th>
            <th>Datum</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($data['posts'] as $row): ?>
        <tr>
            <td><?php echo $row->post_id ?></td>
            <td><?php echo $row->post_content ?></td>
            <td><?php echo $row->post_author_name ?></td>
            <td><?php echo $row->post_time ?></td>
            <td><a href="posts_edit?post_id=<?php echo $row->post_id?>" class="btn btn-primary btn-xs"> Edit</a></td>
            <td><a href="posts_edit?post_id=<?php echo $row->post_id?>" class="btn btn-danger btn-xs"> Delete</a></td>
        </tr>
        <?php endforeach ?>
    </table>
	</div>



