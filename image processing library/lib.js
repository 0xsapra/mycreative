function Processor(cc){
	
	//variables
	this.width=cc.width;
	this.height=cc.height;
	this.data=undefined;
	this.pixel=undefined;
	this.resizeon=false;
	this.drawPnt=false;
	this.drawPnt1=false;
	this.color="black";
	this.radius=5;
	this.image=new Image();
	this.can=cc;
	this.context=cc.getContext('2d');
	this.effector='light';
	this.obj={'r':255,'g':255,'b':255,'a':255};
	this.tremor={
		'sharpen':[-1,-1,-1,-1,9,-1,-1,-1,-1],
		'smooth':[1,1,1,1,1,1,1,1,1]

	};
	//internal function

	//----------------------------------------------add image----------------------------------------------------------------
	this.addImage=function(src,func){
		
		if(src[0]!='.'){
			this.image.src=src;
		}
		this.image.onload=function(){
			this.context.drawImage(this.image,0,0,this.width,this.height);
			this.data=this.context.getImageData(0,0,this.width,this.height);
			this.pixel=this.data.data.length/4;
			func();
		}.bind(this);	
	};
	//----------------------------------------------helper----------------------------------------------------------------

	this.getThePix=function(x){
		this.obj.r=this.data.data[x];
		this.obj.g=this.data.data[x+1];
		this.obj.b=this.data.data[x+2];
		this.obj.a=this.data.data[x+3];
	};
	this.colorAll=function(pixelr,y){
		this.data.data[pixelr]=y;
		this.data.data[pixelr+1]=y;
		this.data.data[pixelr+2]=y;
		// this.data.data[pixelr+3]=y;
	};
	this.brightness=function(pixelr){
		return (0.33*this.data.data[pixelr] + 0.5*this.data.data[pixelr+1] + 0.16*this.data.data[pixelr+2]);

	};

	this.prevProcess=function(){

		for (var i = 0; i < this.height; i++)
		for (var j=0;j<this.width;j++){	
			var toUse=(j+i*this.width)*4;
			
			this.getThePix(toUse);
		
			if(this.effector=="light"){
				this.prevlight();
			}else if(this.effector=="grayscale"){
				this.prevgray();
			}else if(this.effector=="crazy"){
				this.prevCrazy();
			}else{
				alert("Unknown Effect!");
			}
			//apply
			this.data.data[toUse]=this.obj.r;
			this.data.data[toUse+1]=this.obj.g;
			this.data.data[toUse+2]=this.obj.b;
			this.data.data[toUse+3]=this.obj.a;
		}
	};
	
	this.prevlight=function(){
			this.obj.r=this.obj.r+12;
			this.obj.g=this.obj.g+12;
			this.obj.b=this.obj.b+17;
			this.obj.a=this.obj.a*2.11;
	};	
	this.prevgray=function(){
			grsc=this.obj.r+this.obj.g+this.obj.b;
			this.obj.r=grsc;
			this.obj.g=grsc;
			this.obj.b=grsc;
			this.obj.a=this.obj.a+11;
	};

	this.prevCrazy=function(){
			xcxc=this.obj.r*Math.sin(this.obj.r);
			this.obj.r=this.obj.g;
			this.obj.g=xcxc;
			this.obj.b=this.obj.b;
	};
	this.sharpener=function(toUse){
			//red
		this.data.data[toUse[1][1]]=(this.data.data[toUse[0][0]]*this.tremor.sharpen[0])+(this.data.data[toUse[0][1]]*this.tremor.sharpen[1])
		+(this.data.data[toUse[0][2]]*this.tremor.sharpen[2])+(this.data.data[toUse[1][0]]*this.tremor.sharpen[3])+
		(this.data.data[toUse[1][1]]*this.tremor.sharpen[4])+(this.data.data[toUse[1][2]]*this.tremor.sharpen[5])+
		(this.data.data[toUse[2][0]]*this.tremor.sharpen[6])+(this.data.data[toUse[2][1]]*this.tremor.sharpen[7])+
		(this.data.data[toUse[2][2]]*this.tremor.sharpen[8]);
				// green
		this.data.data[toUse[1][1]+1]=(this.data.data[toUse[0][0]+1]*this.tremor.sharpen[0])+(this.data.data[toUse[0][1]+1]*this.tremor.sharpen[1])
		+(this.data.data[toUse[0][2]+1]*this.tremor.sharpen[2])+(this.data.data[toUse[1][0]+1]*this.tremor.sharpen[3])+
		(this.data.data[toUse[1][1]+1]*this.tremor.sharpen[4])+(this.data.data[toUse[1][2]+1]*this.tremor.sharpen[5])+
		(this.data.data[toUse[2][0]+1]*this.tremor.sharpen[6])+(this.data.data[toUse[2][1]+1]*this.tremor.sharpen[7])+
		(this.data.data[toUse[2][2]+1]*this.tremor.sharpen[8]);
				//blue
		this.data.data[toUse[1][1]+2]=(this.data.data[toUse[0][0]+2]*this.tremor.sharpen[0])+(this.data.data[toUse[0][1]+2]*this.tremor.sharpen[1])
		+(this.data.data[toUse[0][2]+2]*this.tremor.sharpen[2])+(this.data.data[toUse[1][0]+2]*this.tremor.sharpen[3])+
		(this.data.data[toUse[1][1]+2]*this.tremor.sharpen[4])+(this.data.data[toUse[1][2]+2]*this.tremor.sharpen[5])+
		(this.data.data[toUse[2][0]+2]*this.tremor.sharpen[6])+(this.data.data[toUse[2][1]+2]*this.tremor.sharpen[7])+
		(this.data.data[toUse[2][2]+2]*this.tremor.sharpen[8]);
	};

	this.smoothen=function(toUse){
		// 1+1+1+1+1+1+1+1+1+1/9 is mean and thus smooth detecting algo
				//red
	this.data.data[toUse[1][1]]=((this.data.data[toUse[0][0]]*this.tremor.smooth[0])+(this.data.data[toUse[0][1]]*this.tremor.smooth[1])
	+(this.data.data[toUse[0][2]]*this.tremor.smooth[2])+(this.data.data[toUse[1][0]]*this.tremor.smooth[3])+
	(this.data.data[toUse[1][1]]*this.tremor.smooth[4])+(this.data.data[toUse[1][2]]*this.tremor.smooth[5])+
	(this.data.data[toUse[2][0]]*this.tremor.smooth[6])+(this.data.data[toUse[2][1]]*this.tremor.smooth[7])+
	(this.data.data[toUse[2][2]]*this.tremor.smooth[8]))/9;
			// green
	this.data.data[toUse[1][1]+1]=((this.data.data[toUse[0][0]+1]*this.tremor.smooth[0])+(this.data.data[toUse[0][1]+1]*this.tremor.smooth[1])
		+(this.data.data[toUse[0][2]+1]*this.tremor.smooth[2])+(this.data.data[toUse[1][0]+1]*this.tremor.smooth[3])+
		(this.data.data[toUse[1][1]+1]*this.tremor.smooth[4])+(this.data.data[toUse[1][2]+1]*this.tremor.smooth[5])+
		(this.data.data[toUse[2][0]+1]*this.tremor.smooth[6])+(this.data.data[toUse[2][1]+1]*this.tremor.smooth[7])+
		(this.data.data[toUse[2][2]+1]*this.tremor.smooth[8]))/9;
			//blue
	this.data.data[toUse[1][1]+2]=((this.data.data[toUse[0][0]+2]*this.tremor.smooth[0])+(this.data.data[toUse[0][1]+2]*this.tremor.smooth[1])
		+(this.data.data[toUse[0][2]+2]*this.tremor.smooth[2])+(this.data.data[toUse[1][0]+2]*this.tremor.smooth[3])+
		(this.data.data[toUse[1][1]+2]*this.tremor.smooth[4])+(this.data.data[toUse[1][2]+2]*this.tremor.smooth[5])+
		(this.data.data[toUse[2][0]+2]*this.tremor.smooth[6])+(this.data.data[toUse[2][1]+2]*this.tremor.smooth[7])+
		(this.data.data[toUse[2][2]+2]*this.tremor.smooth[8]))/9;

	};

	//----------------------------------------------main drawing functions

	//----------------------------------------------resize---------------------------------------------------------------------
	this.resize=function(x,y){
		this.resizeon=true;
		this.can.addEventListener('mousemove',function(e){
		if(this.resizeon){this.context.clearRect(0,0,this.width,this.height);
		this.width=e.clientX;
		this.height=e.clientY;
		this.context.drawImage(this.image,0,0,this.width,e.clientY);}//get mouse position
		this.can.addEventListener('click',function(e){this.resizeon=false;}.bind(this));}.bind(this));};
	//----------------------------------------------draw-----------------------------------------------------------------------
	this.draw=function(e){
		this.drawPnt=!this.drawPnt;
		if(this.drawPnt){
			this.can.onclick=function(){this.drawPnt1=!this.drawPnt1}.bind(this);
			this.can.addEventListener('mousemove',function(e){
				if(this.drawPnt){
				this.context.fillStyle=this.color;
				if(this.drawPnt1){
					this.context.beginPath();
					this.context.arc(e.clientX,e.clientY,this.radius,0,Math.PI*2);
					this.context.fill();
				}
				this.context.closePath();}
			}.bind(this));

			
			}
			}.bind(this);

	//----------------------------------------------effect---------------------------------------------------------------------
	this.effectDone=function(){
		if(this.effector=='pencil'){
			this.pencil();
		}else if(this.effector=="sharpen"){
			this.sharpen();
		}else if(this.effector=="smooth"){
			this.smooth();
		}
		else{
			this.prevProcess();
		}
		
		}.bind(this);





	this.effect=function(){
		this.data=this.context.getImageData(0,0,this.width,this.height);
		this.pixel=this.data.data.length/4;
		this.effectDone();
		
		this.context.putImageData(this.data,0,0);
	}.bind(this);
	
	//----------------------------------------------neighbour pix manipulate---------------------------------------------------------------------
	


	this.pencil=function(){
		console.log('s');
		this.data=this.context.getImageData(0,0,this.width,this.height);
		for (var i = 0; i < this.height-1; i++)
		for (var j=0;j<this.width-1;j++)
		{	
			var toUse=(j+i*this.width)*4;
			var toUse1=((j+1+i*this.width))*4;

			var p1=this.brightness(this.data.data[toUse]);
			var p2=this.brightness(this.data.data[toUse1]);

			var diff=Math.abs(p1-p2);
			if(diff>1){
				this.colorAll(toUse,diff);
			}
			else{
				this.colorAll(toUse,255-diff);
			}
			
		}
		this.context.putImageData(this.data,0,0);
		
	}.bind(this);


	this.sharpen=function(){
		this.data=this.context.getImageData(0,0,this.width,this.height);
		for (var i = 1; i < this.height-1; i++)
		for (var j=1;j<this.width-1;j++)
		{	
			var toUse=[];
			toUse[0]=[(j-1-this.width+i*this.width)*4,(j-this.width+i*this.width)*4,(j+1-this.width+i*this.width)*4];
			toUse[1]=[(j-1+i*this.width)*4,(j+i*this.width)*4,(j+1+i*this.width)*4];
			toUse[2]=[(j-1+this.width+i*this.width)*4,(j-1+this.width+i*this.width)*4,(j-1+this.width+i*this.width)*4];
			this.sharpener(toUse);
			

		}
		this.context.putImageData(this.data,0,0);
	}.bind(this);

	this.smooth=function(){
		this.data=this.context.getImageData(0,0,this.width,this.height);
		for (var i = 1; i < this.height-1; i++)
		for (var j=1;j<this.width-1;j++)
		{	
			var toUse=[];
			toUse[0]=[(j-1-this.width+i*this.width)*4,(j-this.width+i*this.width)*4,(j+1-this.width+i*this.width)*4];
			toUse[1]=[(j-1+i*this.width)*4,(j+i*this.width)*4,(j+1+i*this.width)*4];
			toUse[2]=[(j-1+this.width+i*this.width)*4,(j-1+this.width+i*this.width)*4,(j-1+this.width+i*this.width)*4];
			this.smoothen(toUse);
			

		}
		this.context.putImageData(this.data,0,0);
	}.bind(this);
}
