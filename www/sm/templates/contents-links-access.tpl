{foreach $links as $key=>$value}
	{if $value.name !== ''}
	<div class="link-container">
		<a class="access-link" onclick="return $.fn.active('parseclick', '{$id}|{$key}|{$tbl}');" href="#">
			{$value.name}
			{if $value.free == 1}
			<span>(�� ��������� �����������)</span>
			{else}
			<span>(��������� �����������)</span>
			{/if} 	
		</a>
		<div class="remark">��������� � ����� ����</div>
	</div>
	{/if}
{/foreach}
<div class="clear"></div>