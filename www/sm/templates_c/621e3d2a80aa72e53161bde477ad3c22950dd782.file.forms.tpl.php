<?php /* Smarty version Smarty-3.1.12, created on 2013-01-29 11:14:03
         compiled from "sm\templates\forms.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1634550f5b8b53dac67-25806590%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '621e3d2a80aa72e53161bde477ad3c22950dd782' => 
    array (
      0 => 'sm\\templates\\forms.tpl',
      1 => 1359445949,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1634550f5b8b53dac67-25806590',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f5b8b54c8f99_66435267',
  'variables' => 
  array (
    'session' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f5b8b54c8f99_66435267')) {function content_50f5b8b54c8f99_66435267($_smarty_tpl) {?><div class="modal-container" id="modal-container">
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
							type="hidden" name="sid" value="<?php echo $_smarty_tpl->tpl_vars['session']->value;?>
">
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
							type="hidden" name="sid" value="<?php echo $_smarty_tpl->tpl_vars['session']->value;?>
"> <input
							type="hidden" name="send_spam" value="0">

						<div class="sunny-form-label">Фамилия <span>*</span></div>
						<div class="sunny-form-element">
							<input type="text" name="f" class="sunny-form-text">
						</div>
						<div class="clr"></div>

						<div class="sunny-form-label">Имя <span>*</span></div>
						<div class="sunny-form-element">
							<input type="text" name="i" class="sunny-form-text">
						</div>
						<div class="clr"></div>

						<div class="sunny-form-label">Отчество</div>
						<div class="sunny-form-element">
							<input type="text" name="o" class="sunny-form-text">
						</div>
						<div class="clr"></div>
						
						<div class="sunny-form-label">Название компании <span>*</span></div>
						<div class="sunny-form-element">
							<input type="text" name="company" class="sunny-form-text">
						</div>
						<div class="clr"></div>

						<div class="sunny-form-label">Название должности <span>*</span></div>
						<div class="sunny-form-element">
							<input type="text" name="post" class="sunny-form-text">
						</div>
						<div class="clr"></div>
						
						<div class="sunny-form-label">Телефон <span>*</span></div>
						<div class="sunny-form-element">
							<input type="text" name="phone" class="sunny-form-text">
							<div class="remarc">Телефон в формате +ХХХХХХХХХХХХ</div>
						</div>
						<div class="clr"></div>
						
						<div class="sunny-form-label">Эл. почта <span>*</span></div>
						<div class="sunny-form-element">
							<input type="text" name="email" class="sunny-form-text">
						</div>
						<div class="clr"></div>

						<div class="sunny-form-label">Пароль <span>*</span></div>
						<div class="sunny-form-element">
							<input type="password" name="password" class="sunny-form-text">
							<div class="remarc">От 5 до 12 латинских символов и цифр</div>
						</div>
						<div class="clr"></div>

						<div class="sunny-form-label">Повторите пароль <span>*</span></div>
						<div class="sunny-form-element">
							<input type="password" name="password_" class="sunny-form-text">
						</div>
						<div class="clr"></div>




						<div class="sunny-form-label">Подписаться на рассылку "Инструменты системного управления бизнесом"</div>
						<div class="sunny-form-element">
							<input type="checkbox" name="send_spam" checked>
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
	</div><?php }} ?>