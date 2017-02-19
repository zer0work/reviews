<div class="row">
  <div class="main-container container">


    <a class="exit-link btn btn-default navbar-btn" href="/auth/logout">Выйти</a>

    <div class="admin-reviews">
      <?php foreach ($data as $value): ?>
        <article class="reviews__item">
          <div class="status status-<?php echo $value->checked ?>"><?php $value->checked ? print('Принят') : print('Отклонён');?></div>
          <strong><?php echo $value->name ?></strong> 
          <em>
            <a href="mailto:#"><?php echo $value->email ?></a>
            <time><?php echo $value->date ?></time>
          </em>
          <span class="edit-admin"><?php $value->edit ? print("(изменено администратором)") : null ?></span>
          <p><?php echo $value->text ?></p>
          <?php $value->img ? print('<img src="' . $value->img . '" width="320" height="240">') : null  ?>
          <div class="edit-link">
            <a href="/admin /moder/?id=<?php echo $value->id .'&moder=1' ?>">Принять</a>
            <a href="/admin /moder/?id=<?php echo $value->id . '&moder=0' ?>">Отклонить</a>
            <a href="/edit/index/?id=<?php echo $value->id ?>">Редактировать</a>
            <a href="/edit/delete/?id=<?php echo $value->id ?>">Удалить</a>
        </div>
        </article>
      <?php endforeach; ?>
    </div>


  </div>
</div>