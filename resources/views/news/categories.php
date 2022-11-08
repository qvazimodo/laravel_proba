<?php foreach ($categories as $category): ?>
    <a href="<?= route('news.category.show', $category['slug']) ?>"><?=  $category['title'] ?></a><br>
<?php endforeach; ?>
