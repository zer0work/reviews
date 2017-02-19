<nav class="navbar navbar-default">
	<span class="navbar-text">Сортировать по: </span>
	<ul class="nav navbar-nav">
		<li><a href="/">дате</a></li>
		<li><a href="/main/index/?sort=name">имени</a></li>
		<li><a href="/main/index/?sort=email">email</a></li>
	</ul>
</nav>

<!-- REVIEWS -->

<div class="reviews">
	<?php foreach ($data as $value): ?>
		<?php if (!$value->checked) continue; ?>
		<article class="reviews__item">
			<strong><?php echo $value->name ?></strong>
			<em>
				<a href="mailto:#"><?php echo $value->email ?></a>
				<time><?php echo $value->date ?></time>
			</em>
			<span class="edit-admin"><?php $value->edit ? print("(изменено администратором)") : null ?></span>
				<p><?php echo $value->text ?></p>
					<?php $value->img ? print('<img src="../../' . $value->img . '" width="320" height="240">') : null  ?>
		</article>
	<?php endforeach; ?>
</div>
