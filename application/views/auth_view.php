<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="auth">
			<form action="/auth/" method="post">
				<input class="field field__login" type="text" name="login" placeholder="Логин"  required>
				<input class="field field__password" type="password" name="password" placeholder="Пароль" required>
				<span class="error" ><?php echo $data ?></span>
				<input class="send-btn" type="submit">
			</form>
		</div>
	</div>
</div>