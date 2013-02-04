{foreach $links as $key=>$value}
	{if $value.name !== ''}
	<div class="link-container">
		<a class="access-link" onclick="return $.fn.active('parseclick', '{$id}|{$key}|{$tbl}');" href="#">
			{$value.name}
			{if $value.free == 1}
			<span>(Не требуется регистрация)</span>
			{else}
			<span>(Требуется регистрация)</span>
			{/if} 	
		</a>
		<div class="remark">откроется в новом окне</div>
	</div>
	{/if}
{/foreach}
<div class="clear"></div>