{foreach $links as $key=>$value}
	<div><a class="access-link" onclick="return $.fn.active('parseclick', '{$id}|{$key}');" href="#">{$value.name}</a></div>
{/foreach}