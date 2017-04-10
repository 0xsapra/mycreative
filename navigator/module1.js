var btn1 =document.getElementsByClassName('btn')[0];
btn1.addEventListener('click',function(){
    var remover=document.getElementsByClassName('hide')[0];
    remover.className="on-display";
    this.className="hide";
	 });