<div class="login-buttons">
		
		{if $link == 1}
		<a class="login-buttons-register" href="/stat">����������</a>
		{/if}
		<a class="login-buttons-login via_ajax" href="#" onclick="$.fn.active('request', '/frontendUnLogin', '{}');">�����</a>
		<div class="username">{$name}</div>
		<div class="message">�� ������������ ��� </div>
		<div class="clr"></div>
</div>