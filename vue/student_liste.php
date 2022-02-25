<table>

    <tr>
        <th>Id</th>
        <th>School Year id</th>
        <th>Project id</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Created at</th>
        <th>Updated_at</th>

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
            <td><a href="index.php?table=student&id=<?= $student['id'] ?>&op=delete">❌</a></td>
            <td><a href="index.php?table=student&id=<?= $student['id'] ?>&op=update">🖊️</a></td>
        </tr>
    <?php } ?>

</table>
<!-- Le op execute l'opération --!>