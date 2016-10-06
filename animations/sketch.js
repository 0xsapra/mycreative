function bubble(x,y){
  this.x= x;
  this.y=y;
   this.display=function() {
    ellipse(this.x,this.y,20,20);
  };
  this.move=function(){
        ellipse(random(this.x+5,this.x-5),random(this.y+5,this.y-5),20,20);
        
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
    bubbles[i].move();
  }
}


function mousePressed(){
  var x=mouseX;
  var y=mouseY;
  
  bubbles[i]=new bubble(x,y);
  bubbles[i].display();
  i++;
}