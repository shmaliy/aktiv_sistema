function subgroups_my(obj)
{
	var nested = document.getElementById(obj.id+"_sub");
//alert(nested);

	if(nested.style.display=='none')
	{
		nested.style.display='block';
 document.getElementById(obj.id+"_i").style.backgroundImage='url(./img/lm_bull_a.gif)';
	}
	else
	{
		nested.style.display='none';
 document.getElementById(obj.id+"_i").style.backgroundImage='url(./img/lm_bull.gif)';
	}

}