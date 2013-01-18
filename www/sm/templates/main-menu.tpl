<div class="mainmenu">
	<ul class="main">
		<!-- {$i = 0} -->
		{foreach $menu as $item}
		<!-- {$i++} -->
		<li>
			<a href="/{$item.href}">
			{if $item.current == 0}
			<img src="/images/design/menu_{$item.alias}.jpg">
			{else}
			<img src="/images/design/menu_{$item.alias}_open.jpg">
			{/if}
			</a>
			{if !empty($item.childs)}
			{if $item.current == 1}
			<ul class="sub">
			{else}
			<ul class="sub hidden">
			{/if}
				<!-- {$k = 0} -->
				{foreach $item.childs as $child}
				<!-- {$k++} -->
				<li>
					{if $child.current == 1}
					<a class="active" href="/{$child.href}">{$i}.{$k} {$child.title}</a>
					{else}
					<a class="inactive" href="/{$child.href}">{$i}.{$k} {$child.title}</a>
					{/if}
				</li>
				{/foreach}
			</ul>
			{/if}
		</li>
		{/foreach}
	</ul>
</div>