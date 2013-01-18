<div class="login-buttons">
		
		{if $link == 1}
		<a class="login-buttons-register" href="/stat">Статистика</a>
		{/if}
		<a class="login-buttons-login via_ajax" href="#" onclick="$.fn.active('request', '/frontendUnLogin', '{}');">Выйти</a>
		<div class="username">{$name}</div>
		<div class="message">Вы авторизованы как </div>
		<div class="clr"></div>
</div>