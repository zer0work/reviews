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
		<?php if (!$value->check) continue; ?>
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


<!-- FORM -->

<div class="reviews-form" id="add">
	<form method="post" id='reviewForm' action="main/insert" enctype="multipart/form-data">
		<fieldset class="form-group">
			<legend>Добавить отзыв</legend>
			<div class="form-group">
				<input type="text" class="form-control" id='userName' placeholder="* Ваше имя" name="name" required>
			</div>
			<div class="form-group">
				<input type="email" class="form-control" id="userEmail" placeholder="* Ваш email" name="email" required>
			</div>
			<div class="form-group">
				<textarea class="form-control" rows="8" id="userText" name="text" placeholder="* Текст отзыва" required></textarea>
			</div>
			<div class="form-group">
				<input type="hidden">
				<label for="imgAdd">Добавьте картинку</label>
				<input type="file" id="imgAdd" name="image"  accept="image/*" onchange="handleFiles(this.files)">
			</div>

			<input type="submit" class="btn btn-default"></input>
			<button type="button" onclick="getFormData()" class="btn btn-default">Предварительный просмотр</button>
		</fieldset>
	</form>
</div>


<!-- PREVIEW -->

<div class="preview off">
		<article class="reviews__item">
			<strong id='previewName'></strong> 
			<em>
				<a href="mailto:#" id='previewEmail'></a>
				<time id='previewDate'></time>
			</em>
				<p id='previewText'></p>
				<div id="previmage"></div>


		</article>
</div>