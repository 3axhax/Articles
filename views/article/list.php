<div class="page-header">
    <h3><?= static::$title ?></h3>
</div>
<table class="table table-striped table-hover">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Date</th>
        <th></th>
    </tr>
    <?php
    foreach ($articles as $article):?>
        <tr>
            <td><?= $article['id'] ?></td>
            <td><?= $article['title'] ?></td>
            <td><?= $article['date'] ?></td>
            <td class="text-center">
                <a href="/article/<?= $article['id'] ?>" title="Просмотр"><span
                        class="glyphicon glyphicon-eye-open"></span></a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
