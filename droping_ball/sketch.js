function bubble(x,y){
  this.x= x;
  this.y=y;
  this.velocity=2.5;
   this.display=function() {
    ellipse(this.x,this.y,20,20);
  };
  this.move=function(){
      var temp=this.y;
        if(this.y<=height && this.y>=6){
          this.y+=this.velocity;
        }
        else{
          this.velocity*=-1;
          this.y+=this.velocity;
          
        }
        
  }

  
};
var bubbles=[],i=0;

function setup() {
  
  createCanvas(600,600);
  background(200,200,10);

}

function draw() {
  background(200,200,10);
  noFill();
  stroke(0);
  for(var i=0;i<bubbles.length;i++){
    bubbles[i].display();
    bubbles[i].move();
  }
}


function mousePressed(){
  var x=mouseX;
  var y=mouseY;
  
  bubbles[i]=new bubble(x,y);
  
  i++;
}