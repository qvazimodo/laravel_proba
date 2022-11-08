
<?php foreach ($news as $item): ?>
    <a href="<?= route('news.show', $item['id']) ?>"><?= $item['title'] ?></a><br>
<?php endforeach; ?>

