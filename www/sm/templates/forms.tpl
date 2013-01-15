<div class="modal-container" id="modal-container">
		<div class="sunny-form">
			<div class="sunny-form-tabs">
				<ul class="tabs-list">
					<li class="login" id="tabs-list-login"
						onclick="$.fn.active('panelswitcher', this.id);"><span>Войти</span>
					</li>
					<li class="register" id="tabs-list-register"
						onclick="$.fn.active('panelswitcher', this.id);"><span>Зарегистрироваться</span>
					</li>
				</ul>
			</div>
			<div class="sunny-form-body-top"></div>
			<div class="sunny-form-body">
				<a class="close" href="#"
					onclick="$.fn.active('hidemodal', 'modal-container');"></a>

				<div id="sunny-form-body-login" class="sunny-form-body-form-login">
					<form enctype="multypart/form-data" class="via_ajax"
						action="/frontendLogin">
						<input type="hidden" name="url" value="/frontendLogin"> <input
							type="hidden" name="sid" value="{$session}">
						<div class="sunny-form-label">Эл. почта</div>
						<div class="sunny-form-element">
							<input type="text" name="email" class="sunny-form-text">
						</div>
						<div class="clr"></div>

						<div class="sunny-form-label">Пароль</div>
						<div class="sunny-form-element">
							<input type="password" name="password" class="sunny-form-text">
						</div>
						<div class="clr"></div>

						<!-- 						<div class="sunny-form-label"></div> -->
						<!--						<div class="sunny-form-element"><a class="forgot-password" href="#" onclick="$.fn.active('panelswitcher', 'sunny-form-body-forgot-password');">Забыли пароль?</a></div> -->
						<!-- 						<div class="clr"></div> -->

						<div class="sunny-form-label"></div>
						<div class="sunny-form-element">
							<input type="submit" value="Войти"
								class="sunny-form-login-button">
						</div>
						<div class="clr"></div>
					</form>
					<div id="sunny-form-error"></div>
					<div id="sunny-form-success"></div>
				</div>


				<div id="sunny-form-body-register" class="sunny-form-body-form">
					<form enctype="multypart/form-data" class="via_ajax"
						action="/frontendRegister">
						<input type="hidden" name="url" value="/frontendRegister"> <input
							type="hidden" name="sid" value="{$session}"> <input
							type="hidden" name="send_spam" value="0">

						<div class="sunny-form-label">Эл. почта</div>
						<div class="sunny-form-element">
							<input type="text" name="email" class="sunny-form-text">
						</div>
						<div class="clr"></div>

						<div class="sunny-form-label">Пароль</div>
						<div class="sunny-form-element">
							<input type="password" name="password" class="sunny-form-text">
						</div>
						<div class="clr"></div>

						<div class="sunny-form-label">Повторите пароль</div>
						<div class="sunny-form-element">
							<input type="password" name="password_" class="sunny-form-text">
						</div>
						<div class="clr"></div>

						<div class="sunny-form-label">Телефон</div>
						<div class="sunny-form-element">
							<input type="text" name="phone" class="sunny-form-text">
						</div>
						<div class="clr"></div>

						<div class="sunny-form-label">Фамилия</div>
						<div class="sunny-form-element">
							<input type="text" name="f" class="sunny-form-text">
						</div>
						<div class="clr"></div>

						<div class="sunny-form-label">Имя</div>
						<div class="sunny-form-element">
							<input type="text" name="i" class="sunny-form-text">
						</div>
						<div class="clr"></div>

						<div class="sunny-form-label">Отчество</div>
						<div class="sunny-form-element">
							<input type="text" name="o" class="sunny-form-text">
						</div>
						<div class="clr"></div>

						<div class="sunny-form-label">Название компании</div>
						<div class="sunny-form-element">
							<input type="text" name="company" class="sunny-form-text">
						</div>
						<div class="clr"></div>

						<div class="sunny-form-label">Название должности</div>
						<div class="sunny-form-element">
							<input type="text" name="post" class="sunny-form-text">
						</div>
						<div class="clr"></div>

						<div class="sunny-form-label">Подписаться на рассылку</div>
						<div class="sunny-form-element">
							<input type="checkbox" name="send_spam">
						</div>
						<div class="clr"></div>

						<div class="sunny-form-label"></div>
						<div class="sunny-form-element">
							<input type="submit" value="Отправить"
								class="sunny-form-login-button">
						</div>
						<div class="clr"></div>
					</form>
					<div id="sunny-form-error-register"></div>
					<div id="sunny-form-success-register"></div>
				</div>

				<div id="sunny-form-body-forgot-password"
					class="sunny-form-body-form">dfsdf</div>


			</div>
			<div class="sunny-form-body-bottom"></div>
		</div>
		<div class="clr"></div>
	</div>