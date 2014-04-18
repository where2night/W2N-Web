function paintButton(){
	
if(!(ide==id_abs)){
	
	//if(follow()){
		
		//document.write("<input id='btn01'  class='botonseguir' type='button'value='SIGUIENDO'onClick='changeMyClassName(this);'>");  
		//document.getElementById('btn01').className='myClickedButton';
	
	//}else
		//if you  don't follow
	
	document.write("<input id='btn01'  class='btn btn-success botonseguir' type='button'value='Agregar Fiestero'onClick='changeMyClassName(this);'style='background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;'>");
	
	
	
	}
}





function changeMyClassName(theSeguirBtn)
{
	
	if(!(ide==id_abs)){
	
			myButtonID = theSeguirBtn.id;
			if(document.getElementById(myButtonID).className=='myClickedSeguir')
			{
				document.getElementById(myButtonID).className='myDefaultSeguir';
				document.getElementById(myButtonID).value='Agregar Fiestero';
			}
			else
			{
				document.getElementById(myButtonID).className='myClickedSeguir';
				document.getElementById(myButtonID).value='Fiestero Agregado';
			}

	}

}