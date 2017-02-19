<div class="row">
  <div class="main-container container">

  
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
        <div class="errorPrev"></div>
            <input type="submit" class="btn btn-default"></input>
            <button type="button" onclick="getFormData()" class="btn btn-default">Предварительный просмотр</button>
        </fieldset>
      </form>
    </div>


    <!-- PREVIEW -->

    <div class="preview off">
      <article class="reviews__item">
        <strong class="previewName"></strong>
        <em>
          <a href="mailto:#" class ='previewEmail'></a>
          <time class='previewDate'></time>
        </em>
          <p class='previewText'></p>
          <div id="previmage"></div>
      </article>
    </div>


  </div>
</div>