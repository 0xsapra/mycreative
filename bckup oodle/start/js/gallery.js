var keep_track_of_of_mouseover=0;
// $('.position-on').on('mouseover',function(){
// 		var focused;
// 		keep_track_of_of_mouseover++;
// 		focused=event.target.id;
// 		var d=document;
		
// 		if(focused=="galery-img-left" && keep_track_of_of_mouseover===1){

// 		}else if(focused=="galery-img-right" && keep_track_of_of_mouseover===1){
// 		var lefter_left=d.getElementById('far_left').offsetLeft,lefter_top=d.getElementById('far_left').offsetTop;
// 		var lefty_left=d.getElementById('galery-img-left').offsetLeft,lefty_top=d.getElementById('galery-img-left').offsetTop;
		
// 		d.getElementById('galery-img-left').style.top=lefter_top+"px";
// 		d.getElementById('galery-img-left').style.left=lefter_left+"px";
// 		d.getElementById('galery-img').style.top=lefty_top+"px";
// 		d.getElementById('galery-img').style.left=lefty_left+"px";

// 		}else{

// 		}
// 	});
// $('.position-on').on('mouseout',function(){
// 		var focused;
// 		keep_track_of_of_mouseover=0;
// 		focused=event.target.id;
// 		var d=document;
		
// 	});

	var inputs = document.querySelectorAll('.inputfile');
	Array.prototype.forEach.call( inputs, function( input )
	{
		var label	 = input.nextElementSibling,
			labelVal = label.innerHTML;

	input.addEventListener( 'change', function( e )
	{
		var fileName = '';
		if( this.files && this.files.length > 1 )
			fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
		else
			fileName = e.target.value.split( '\\' ).pop();

		if( fileName )
			{label.querySelector('span').innerHTML = fileName.substring(0,14);}
		else
			label.innerHTML = labelVal;
	});
});
