
<?php if (!$news['isPrivate']):?>
<h2><?=$news['title']?></h2>
<p><?=$news['text']?></p>
<?php else: ?>
<p>Зарегистрируйтесь для просмотра</p>
<?php endif ?>
