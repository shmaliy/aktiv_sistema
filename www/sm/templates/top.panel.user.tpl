<div class="login-buttons">
		<div class="message">�� ������������ ��� </div>
		<div class="clr"></div>
		<div class="username">{$name}</div>
		<a class="login-buttons-login via_ajax" href="#" onclick="$.fn.active('request', '/frontendUnLogin', '{}');">�����</a>
		
		{if $link == 1}
		<a class="login-buttons-register" href="/stat">����������</a>
		{/if}
		<div class="clr"></div>
</div>