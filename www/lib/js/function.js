// JavaScript Document
menustate=1;

function insertLink(url,target)
	{
	if(navigator.appName.indexOf('Microsoft')!=-1)
		{
		/*For IE version
		*Use dialogArguments.oUtil.oName to get editor object name and then
		*use insertLink() function to insert your custom link
		*-------------------------------------------------------------
		*/
		var oName=dialogArguments.oUtil.oName;
		eval("dialogArguments."+oName).insertLink(url,target);
		}
	else
		{
		/*For Mozilla version
		*Use window.opener.oUtil.oName to get editor object name and then
		*use insertLink() function to insert your custom link
		*-------------------------------------------------------------
		*/
		var oName=window.opener.oUtil.oName;
		eval("window.opener."+oName).insertLink(url,target);
		}	
	}





function CheckERR() {
	required = new Array("primary_name", "secondary_name");
	required_show = new Array("Название основного раздела", "Название подраздела");
	var i, j;
	for(j=0; j<required.length; j++) {
		for (i=0; i<document.forms[0].length; i++) {
	        if (document.forms[0].elements[i].name == required[j] && document.forms[0].elements[i].value == "" ) {
		        alert('Поле '+'"' + required_show[j]+'"' + ' должно быль заполнено!');
		        document.forms[0].elements[i].focus();
		        return false;
			}
		}
	}
	return true;
}

function submenu(src, w, h) {
  wnd=window.open(src,'','width='+w+', height='+h+',scrollbars=no,resizable=no,status=no,toolbar=no,menubar=no');
}

function toggle(who)
{
 if ( document.getElementById(who).style.display == 'none' )
  document.getElementById(who).style.display = 'inline';
 else
  document.getElementById(who).style.display = 'none';
}

function OffMenu(){
if (menustate==1)
   {
   top.document.getElementById("FrameSet2").cols = '0, *';
   menustate=0;
   document.getElementById("MenuOffImage").innerHTML="<A href='javascript:OffMenu();'><img title='Развернуть меню' src='/Skins/<?=$_SESSION['MySkin'];?>/pics/splitter0.gif' border=0></a>";
   }
   else
   {
   top.document.getElementById("FrameSet2").cols="200,*"
   menustate=1;
   document.getElementById("MenuOffImage").innerHTML="<A href='javascript:OffMenu();'><img title='Свернуть меню' src='/Skins/<?=$_SESSION['MySkin'];?>/pics/splitter1.gif' border=0></a>";
   }
}

function ValidateForm(theform) {
	if(theform['name'].value==''){
		theform['name'].focus();
		alert('Пожалуйста, укажите Ваше Ф.И.О.')
		return false
	}
	if(theform['phone1'].value==''){
		theform['phone1'].focus();
		alert('Пожалуйста, укажите Ваш контактный номер телефона')
		return false
	}else{
	    var re = /^([0-9])|([+0-9])$/i;
	    if (!re.test(theform['phone1'].value)){
			theform['phone1'].select();
			theform['phone1'].focus();
			alert("Указан некорректный контактный номер телефона");
	        return false;
	    }
	}
	if(theform['email'].value==''){
		theform['email'].focus();
		alert('Пожалуйста, укажите Ваш адрес электронной почты')
		return false
/*
	}else{
	    var re = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[A-Za-z0-9-]+)*(\[A-Za-z]{2,3,4})$/i;
	    if (!re.test(theform['email'].value)){
			theform['email'].focus();
			alert("Указан некорректный адрес электронной почты");
	        return false;
	    }
*/
	}
	if(theform['questions'].value==''){
		theform['questions'].focus();
		alert('Пожалуйста, укажите Ваш вопрос')
		return false
	}
	return true
}

function ValidateCalcForm(theform) {
	if(theform['credit_sum'].value==''|| isNaN(parseFloat(theform['credit_sum'].value))	|| parseFloat(theform['credit_sum'].value) < 1){
			if(theform['credit_sum'].focus){
				theform['credit_sum'].focus()
				alert('Укажите сумму кредита')
				return false
			}
		
	}

	if(theform['credit_sum1'].value=='0') {
		if(theform['rate_credit'].value==''|| isNaN(parseFloat(theform['rate_credit'].value))) {
			if(theform['rate_credit'].focus) {
				theform['rate_credit'].focus()
				alert('Укажите годовую ставку')
				return false
			}
		}
		if(theform['term_credit'].value==''	|| isNaN(parseInt(theform['term_credit'].value,10))) {
			if(theform['term_credit'].focus) {
				theform['term_credit'].focus()
				alert('Укажите срок кредитования')
				return false
			}
		}

		if(theform['payment_sum'].value==''|| isNaN(parseFloat(theform['payment_sum'].value))|| parseFloat(theform['payment_sum'].value) < 1){
			if(theform['payment_sum'].focus){
				theform['payment_sum'].focus()
				alert('Укажите сумму первого платежа по кредиту')
				return false
			}
		}
	}
		
		
	if(theform['rate_credit'].value==''
	|| isNaN(parseFloat(theform['rate_credit'].value)))
	{
		if(theform['rate_credit'].focus)
			theform['rate_credit'].focus()
		alert('Укажите годовую ставку')
		return false
	}
	if(theform['term_credit'].value==''
	|| isNaN(parseInt(theform['term_credit'].value,10)))
	{
		if(theform['term_credit'].focus)
			theform['term_credit'].focus()
		alert('Укажите срок кредитования')
		return false
	}
	return true
}

function ValidateDepositForm(theform) {
	if(theform['term'].value=='' || isNaN(parseFloat(theform['term'].value))) {
		if(theform['term'].focus) {
			theform['term'].focus();
			alert('Пожалуйста, укажите срок кредита');
			return false;
		}
	}
	if(theform['procent_year'].value=='' || isNaN(parseFloat(theform['procent_year'].value))) {
		if(theform['procent_year'].focus) {
			theform['procent_year'].focus();
			alert('Пожалуйста, укажите годовой процент');
			return false;
		}
	}
	if(theform['credit_summ'].value=='' || isNaN(parseFloat(theform['credit_summ'].value))) {
		if(theform['credit_summ'].focus) {
			theform['credit_summ'].focus();
			alert('Пожалуйста, укажите cумму депозита');
			return false;
		}
	}
	
	
}


function ASMForms() {
	var creditTypeForm = document.forms.form1.credit_type.value;
	var methodType = document.forms.form1.method_sum.value;
	var questionForm = document.forms.form1.question.value;
	
	var SK = document.forms.form1.credit_sum.value;
	var PS = document.forms.form1.year_rate.value;
	var VK = document.forms.form1.credit_term.value;
	var EK = document.forms.form1.commission.value;
	var PP = document.forms.form1.payment_sum.value;
	var PR = document.forms.form1.price2.value;
	var FS = document.forms.form1.first_sum.value;



//АВТОКРЕДИТОВАНИЕ 
  	if(creditTypeForm == 1 && questionForm ==1 && methodType ==1) {
			_Show('price2');
			_Hide('price1');
			_Show('first_sum');

			_Show('credit_sum1');
			_Hide('credit_sum');
			
			_Show('year_rate');
			_Show('one_commission');
			_Show('commission');
			_Show('credit_term');

			_Show('payment_sum1');
			_Hide('payment_sum');
			
	
			_Show('tr_sum_persent');
			_Show('tr_sum_comiss');
			_Show('general_sum');
	
			_Show('quest');
			_Show('quest1');

			CK1 = PR-(PR*(FS/100));
			SK1 = CK1.toFixed(2);
			if(isNaN(SK1) != 0) {
				document.form1.credit_sum1.value=0;
			} else {
				document.form1.credit_sum1.value=SK1;
			}
			
			SK2 = PR-(PR*(FS/100));
			CK2 = SK2*(PS/100)/12;
			PK1 = SK2/VK;
			KOM1 = CK2*(EK/100);
			OPL = CK2+PK1+KOM1;
			OP1 = OPL.toFixed(2);
			if(isNaN(OP1) != 0) {
				document.form1.payment_sum1.value=0;
			} else {
				document.form1.payment_sum1.value=OP1;
			}
			

		    t = _GetElementById('credit_type_text_span');
		    txt = document.createTextNode('автомобиля');
		    t.replaceChild(txt,t.firstChild);
	}

  	if(creditTypeForm == 1 && questionForm ==2 && methodType ==1) {
			_Show('price1');
			_Hide('price2');

			_Show('first_sum');

			_Show('credit_sum1');
			_Hide('credit_sum');
			
			_Show('year_rate');
			_Show('one_commission');
			_Show('commission');
			_Show('credit_term');
			_Show('payment_sum');
			_Hide('payment_sum1');
	
			_Show('tr_sum_persent');
			_Show('tr_sum_comiss');
			_Show('general_sum');
	
			_Show('quest');
			_Show('quest1');

			CK1 = PP/(1/VK+(PS/100)/12+(EK/100));
			SK1 = CK1.toFixed(2);
			if(isNaN(SK1) != 0) {
				document.form1.credit_sum1.value=0;
			} else {
				document.form1.credit_sum1.value=SK1;
			}


			PRS1 = CK1/(1-(FS/100));
			PSK1 = PRS1.toFixed(2);
			if(isNaN(PSK1) != 0) {
				document.form1.price1.value=0;
			} else {
				document.form1.price1.value=PSK1;
			}


		    t = _GetElementById('credit_type_text_span');
		    txt = document.createTextNode('автомобиля');
		    t.replaceChild(txt,t.firstChild);
	}

  	if(creditTypeForm == 1 && questionForm ==1 && methodType ==2) {
			_Show('price2');
			_Hide('price1');
			_Show('first_sum');

			_Show('credit_sum1');
			_Hide('credit_sum');
			
			_Show('year_rate');
			_Show('one_commission');
			_Show('commission');
			_Show('credit_term');

			_Show('payment_sum1');
			_Hide('payment_sum');
			
	
			_Show('tr_sum_persent');
			_Show('tr_sum_comiss');
			_Show('general_sum');
	
			_Show('quest');
			_Show('quest1');

			CK1 = PR-(PR*(FS/100));
			SK1 = CK1.toFixed(2);
			if(isNaN(SK1) != 0) {
				document.form1.credit_sum1.value=0;
			} else {
				document.form1.credit_sum1.value=SK1;
			}
			
			CK2 = (SK1*((PS/100)/12+(EK/100)))/(1-(Math.pow(1/(1+((PS/100)/12+(EK/100))),VK)));
			OP2 =CK2.toFixed(2);
			if(isNaN(OP2) != 0) {
				document.form1.payment_sum1.value=0;
			} else {
				document.form1.payment_sum1.value=OP2;
			}


		    t = _GetElementById('credit_type_text_span');
		    txt = document.createTextNode('автомобиля');
		    t.replaceChild(txt,t.firstChild);
	}

  	if(creditTypeForm == 1 && questionForm ==2 && methodType ==2) {
			_Show('price1');
			_Hide('price2');

			_Show('first_sum');

			_Show('credit_sum1');
			_Hide('credit_sum');
			
			_Show('year_rate');
			_Show('one_commission');
			_Show('commission');
			_Show('credit_term');
			_Show('payment_sum');
			_Hide('payment_sum1');
	
			_Show('tr_sum_persent');
			_Show('tr_sum_comiss');
			_Show('general_sum');
	
			_Show('quest');
			_Show('quest1');

			CK1 = PP*(1-(Math.pow(1/(1+((PS/100)/12+(EK/100))),VK)))/((PS/100)/12+(EK/100));
			OP1 =CK1.toFixed(2);
			if(isNaN(OP1) != 0) {
				document.form1.credit_sum1.value=0;
			} else {
				document.form1.credit_sum1.value=OP1;
			}
			

			CK2 = OP1/(1-(FS/100));
			SK2 = CK2.toFixed(2);
			if(isNaN(SK2) != 0) {
				document.form1.price1.value=0;
			} else {
				document.form1.price1.value=SK2;
			}
			


		    t = _GetElementById('credit_type_text_span');
		    txt = document.createTextNode('автомобиля');
		    t.replaceChild(txt,t.firstChild);
	}

// ИПОТЕКА
  	if(creditTypeForm == 2 && questionForm ==1 && methodType == 1) {
			_Show('price2');
			_Hide('price1');
			_Show('first_sum');

			_Show('credit_sum1');
			_Hide('credit_sum');
			
			_Show('year_rate');
			_Show('one_commission');
			_Show('commission');
			_Show('credit_term');

			_Show('payment_sum1');
			_Hide('payment_sum');
			
	
			_Show('tr_sum_persent');
			_Show('tr_sum_comiss');
			_Show('general_sum');
	
			_Show('quest');
			_Show('quest1');

			CK1 = PR-(PR*(FS/100));
			SK1 = CK1.toFixed(2);
			if(isNaN(SK1) != 0) {
				document.form1.credit_sum1.value=0;
			} else {
				document.form1.credit_sum1.value=SK1;
			}
			
			SK2 = PR-(PR*(FS/100));
			CK2 = SK2*(PS/100)/12;
			PK1 = SK2/VK;
			KOM1 = CK2*(EK/100);
			OPL = CK2+PK1+KOM1;
			OP1 = OPL.toFixed(2);
			if(isNaN(OP1) != 0) {
				document.form1.payment_sum1.value=0;
			} else {
				document.form1.payment_sum1.value=OP1;
			}
			

		    t = _GetElementById('credit_type_text_span');
		    txt = document.createTextNode('недвижимости');
		    t.replaceChild(txt,t.firstChild);
	}

  	if(creditTypeForm == 2 && questionForm ==1 && methodType == 2) {
			_Show('price2');
			_Hide('price1');
			_Show('first_sum');

			_Show('credit_sum1');
			_Hide('credit_sum');
			
			_Show('year_rate');
			_Show('one_commission');
			_Show('commission');
			_Show('credit_term');

			_Show('payment_sum1');
			_Hide('payment_sum');
			
	
			_Show('tr_sum_persent');
			_Show('tr_sum_comiss');
			_Show('general_sum');
	
			_Show('quest');
			_Show('quest1');

			CK1 = PR-(PR*(FS/100));
			SK1 = CK1.toFixed(2);
			if(isNaN(SK1) != 0) {
				document.form1.credit_sum1.value=0;
			} else {
				document.form1.credit_sum1.value=SK1;
			}
			
			CK2 = (SK1*((PS/100)/12+(EK/100)))/(1-(Math.pow(1/(1+((PS/100)/12+(EK/100))),VK)));
			OP2 =CK2.toFixed(2);
			if(isNaN(OP2) != 0) {
				document.form1.payment_sum1.value=0;
			} else {
				document.form1.payment_sum1.value=OP2;
			}
			

		    t = _GetElementById('credit_type_text_span');
		    txt = document.createTextNode('недвижимости');
		    t.replaceChild(txt,t.firstChild);
	}

if(creditTypeForm == 2 && questionForm ==2 && methodType == 1) {
			_Show('price1');
			_Hide('price2');

			_Show('first_sum');

			_Show('credit_sum1');
			_Hide('credit_sum');
			
			_Show('year_rate');
			_Show('one_commission');
			_Show('commission');
			_Show('credit_term');
			_Show('payment_sum');
			_Hide('payment_sum1');
	
			_Show('tr_sum_persent');
			_Show('tr_sum_comiss');
			_Show('general_sum');
	
			_Show('quest');
			_Show('quest1');

			CK1 = PP/(1/VK+(PS/100)/12+(EK/100));
			SK1 = CK1.toFixed(2);
			if(isNaN(SK1) != 0) {
				document.form1.credit_sum1.value=0;
			} else {
				document.form1.credit_sum1.value=SK1;
			}


			PRS1 = CK1/(1-(FS/100));
			PSK1 = PRS1.toFixed(2);
			if(isNaN(PSK1) != 0) {
				document.form1.price1.value=0;
			} else {
				document.form1.price1.value=PSK1;
			}


		    t = _GetElementById('credit_type_text_span');
		    txt = document.createTextNode('недвижимости');
		    t.replaceChild(txt,t.firstChild);
	}

if(creditTypeForm == 2 && questionForm ==2 && methodType == 2) {
			_Show('price1');
			_Hide('price2');

			_Show('first_sum');

			_Show('credit_sum1');
			_Hide('credit_sum');
			
			_Show('year_rate');
			_Show('one_commission');
			_Show('commission');
			_Show('credit_term');
			_Show('payment_sum');
			_Hide('payment_sum1');
	
			_Show('tr_sum_persent');
			_Show('tr_sum_comiss');
			_Show('general_sum');
	
			_Show('quest');
			_Show('quest1');

			CK1 = PP*(1-(Math.pow(1/(1+((PS/100)/12+(EK/100))),VK)))/((PS/100)/12+(EK/100));
			OP1 =CK1.toFixed(2);
			if(isNaN(OP1) != 0) {
				document.form1.credit_sum1.value=0;
			} else {
				document.form1.credit_sum1.value=OP1;
			}
			

			CK2 = OP1/(1-(FS/100));
			SK2 = CK2.toFixed(2);
			if(isNaN(SK2) != 0) {
				document.form1.price1.value=0;
			} else {
				document.form1.price1.value=SK2;
			}
			

		    t = _GetElementById('credit_type_text_span');
		    txt = document.createTextNode('недвижимости');
		    t.replaceChild(txt,t.firstChild);
	}

// ПОТРЕБИТЕЛЬСКИЙ КРЕДИТ
  	if(creditTypeForm == 3 && questionForm == 1 && methodType == 1) {
			_Hide('price');
			_Hide('first_sum');
			_Show('credit_sum');
			_Hide('credit_sum1');
			_Show('year_rate');
			_Show('one_commission');
			_Show('commission');
			_Show('credit_term');
			_Show('payment_sum1');
			_Hide('payment_sum');
	
			_Show('tr_sum_persent');
			_Show('tr_sum_comiss');
			_Show('general_sum');
	
			_Hide('quest');
			_Hide('quest1');

			CK = SK*(PS/100)/12;
			PK = SK/VK;
			KOM = SK*(EK/100);
			OP = CK+PK+KOM;
			OP1 = OP.toFixed(2);
			if(isNaN(OP1) != 0) {
				document.form1.payment_sum1.value=0;
			} else {
				document.form1.payment_sum1.value=OP1;
			}
			
	}

  	if(creditTypeForm == 3 && questionForm ==2 && methodType == 1) {
			CK1 = PP/(1/VK+(PS/100)/12+(EK/100));
			CK2 = CK1.toFixed(2);
		
			if(isNaN(CK2) != 0) {
				document.form1.credit_sum1.value=0;
			} else {
				document.form1.credit_sum1.value=CK2;
			}
			
			_Hide('price');
			_Hide('first_sum');
			_Show('credit_sum1');
			_Hide('credit_sum');
			_Show('year_rate');
			_Show('one_commission');
			_Show('commission');
			_Show('credit_term');
			_Show('payment_sum');
			_Hide('payment_sum1');
	
			_Show('tr_sum_persent');
			_Show('tr_sum_comiss');
			_Show('general_sum');
	
			_Hide('quest');
			_Hide('quest1');
	}
  	if(creditTypeForm == 3 && questionForm == 1 && methodType == 2) {
			_Hide('price');
			_Hide('first_sum');
			_Show('credit_sum');
			_Hide('credit_sum1');
			_Show('year_rate');
			_Show('one_commission');
			_Show('commission');
			_Show('credit_term');
			_Show('payment_sum1');
			_Hide('payment_sum');
	
			_Show('tr_sum_persent');
			_Show('tr_sum_comiss');
			_Show('general_sum');
	
			_Hide('quest');
			_Hide('quest1');

			CK = (SK*((PS/100)/12+(EK/100)))/(1-(Math.pow(1/(1+((PS/100)/12+(EK/100))),VK)));
			OP1 =CK.toFixed(2);
			if(isNaN(OP1) != 0) {
				document.form1.payment_sum1.value=0;
			} else {
				document.form1.payment_sum1.value=OP1;
			}
	}
  	if(creditTypeForm == 3 && questionForm == 2 && methodType == 2) {
			CK1 = PP/(1/VK+(PS/100)/12+(EK/100));
			CK2 = CK1.toFixed(2);
		
			if(isNaN(CK2) != 0) {
				document.form1.credit_sum1.value=0;
			} else {
				document.form1.credit_sum1.value=CK2;
			}
			
			_Hide('price');
			_Hide('first_sum');
			_Show('credit_sum1');
			_Hide('credit_sum');
			_Show('year_rate');
			_Show('one_commission');
			_Show('commission');
			_Show('credit_term');
			_Show('payment_sum');
			_Hide('payment_sum1');
	
			_Show('tr_sum_persent');
			_Show('tr_sum_comiss');
			_Show('general_sum');
	
			_Hide('quest');
			_Hide('quest1');
	}
}

function CalcPension() {
	if(document.forms.form1.radiobutton.value == 1) {
			_Hide('_gor');
			_Hide('_gos');
	}
	if(document.forms.form1.radiobutton.value == 2) {
			_Show('_gor');
			_Hide('_gos');
	}
	if(document.forms.form1.radiobutton.value == 3) {
			_Hide('_gor');
			_Show('_gos');
	}
}