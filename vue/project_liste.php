<table>

<tr>
    <th>Id</th>
    <th>Nom</th>
    <th>Description</th>
    <th>Client Name</th>
    <th>Start Date</th>
    <th>Checkpoint Date</th>
    <th>Delivery Date</th>
</tr>

<?php
foreach ($projects as $project) { ?>
    <tr>
        <td><?= $project['id'] ?></td>
        <td><?= $project['name'] ?></td>
        <td><?= $project['description'] ?></td>
        <td><?= $project['client_name'] ?></td>
        <td><?= $project['start_date'] ?></td>
        <td><?= $project['chekpoint_date'] ?></td>
        <td><?= $project['delivery_date'] ?></td>
        <td>🖊️</td>
        <td><a href="index.php?table=project&id=<?= $project['id'] ?>&op=delete">❌</a></td>
</tr>
<?php } ?>

</table>
<!-- Le op execute l'opération --!>