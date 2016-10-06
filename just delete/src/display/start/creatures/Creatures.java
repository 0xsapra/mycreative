package display.start.creatures;



public abstract class Creatures extends Entity {
	final int HEALTH =100;
	int health;
	public Creatures(float x,float y){
		super(x,y);
		health=HEALTH;
	}
	
}
