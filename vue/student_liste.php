<table>

<tr>
    <th>Id</th>
    <th>school_year_id</th>
    <th>project_id</th>
    <th>firstname</th>
    <th>lastname</th>
    <th>email</th>
    <th>created_at</th>
    <th>updated_at</th>
</tr>

<?php
foreach ($students as $student) { ?>
    <tr>
        <td><?= $student['id'] ?></td>
        <td><?= $student['school_year_id'] ?></td>
        <td><?= $student['project_id'] ?></td>
        <td><?= $student['firstname'] ?></td>
        <td><?= $student['lastname'] ?></td>
        <td><?= $student['email'] ?></td>
        <td><?= $student['created_at'] ?></td>
        <td><?= $student['updated_at'] ?></td>
        <td>🖊️</td>
        <td><a href="student_page.php?table=student&id=<?= $student['id'] ?>&op=delete">❌</a></td>
    </tr>
<?php } ?>

</table>