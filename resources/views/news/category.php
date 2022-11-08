<?php foreach ($news as $item): ?>
    <h2><?=$item['title']?></h2>
<?php if (!$item['isPrivate']):?>
    <a href="<?= route('news.show',$item['id']) ?>">Подробнее..</a><br>
    <?php endif; ?>
<?php endforeach; ?>
