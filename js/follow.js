function changeMyClassName(theButton)
{

if(!(ide==ideEvent)){
	document.write("<input id='btn01'  class='botonseguir' type='button'value='SIGUEME'onClick='changeMyClassName(this);'>");  


myButtonID = theButton.id;
if(document.getElementById(myButtonID).className=='myClickedButton')
{
document.getElementById(myButtonID).className='myDefaultButton';
document.getElementById(myButtonID).value='SIGUEME';
}
else
{
document.getElementById(myButtonID).className='myClickedButton';
document.getElementById(myButtonID).value='SIGUIENDO';
}
}

}