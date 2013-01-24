{foreach $links as $key=>$value}
	{if $value.name !== ''}
	<a class="access-link" onclick="return $.fn.active('parseclick', '{$id}|{$key}|{$tbl}');" href="#">
		{$value.name}
		{if $value.free == 1}
		<span>(Не требуется регистрация)</span>
		{else}
		<span>(Требуется регистрация)</span>
		{/if} 	
	</a>
	{/if}
{/foreach}
<div class="clear"></div>