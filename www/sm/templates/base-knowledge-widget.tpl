<div class="knowledgebase">
	<div class="thumbnail">
		<a href="/base/{$kdata.id}">
		{if !empty($kdata.img_small)}
			<img src="/images/design/bases/{$kdata.img_small}">
		{else}
			<img src="/images/design/bases/baza_znabiy.jpg">
		{/if} 
		</a>
	</div>
	<div class="title">
		<div class="main-title">База знаний <br />
		Новое поступление</div>
		
		<div class="content-title"><a href="/base/{$kdata.id}">{$kdata.title}</a></div>
	</div>
	<div class="clr"></div>
	<div>{$kdata.description}</div>
</div>