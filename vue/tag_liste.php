<table>
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Description</th>
    </tr>

    <?php
    foreach ($tags as $tag) { ?>
        <tr>
            <td><?= $tag['id'] ?></td>
            <td><?= $tag['name'] ?></td>
            <td><?= $tag['description'] ?></td>
            <td><a href="index.php?table=tag&id=<?= $tag['id'] ?>&op=delete">❌</a></td>
            <td><a href="index.php?table=tag&id=<?= $tag['id'] ?>&op=update">🖊️</a></td>
        </tr>
    <?php } ?>

</table>
<!-- Le op execute l'opération --!>