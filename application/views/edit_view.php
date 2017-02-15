<div class="edit reviews-form" id="add">
	<form method="post" id='reviewForm' action="/edit/update/?id=<?php echo $data[0]->id ?>" enctype="multipart/form-data">
		<fieldset class="form-group">

			<div class="form-group">
				<input type="text" class="form-control" id='userName' value="<?php echo $data[0]->name ?>" name="name" required>
			</div>
			<div class="form-group">
				<input type="email"  class="form-control" id="userEmail" value="<?php echo $data[0]->email ?>" name="email" required>
			</div>
			<div class="form-group">
				<input type="date" name="date" value="<?php echo $data[0]->date ?>">
			</div>
			<div class="form-group">
				<textarea class="form-control" rows="8" id="userText" name="text" required><?php echo $data[0]->text ?></textarea>
			</div>
				<?php $data[0]->img ? print('<img src="' . '../../' . $data[0]->img . '" width="320" height="240">') : null  ?>
			<div class="form-group">
				<label for="imgAdd">Изменить картинку</label>
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
				<div id="previmage">
				</div>


		</article>
</div>