package display.start.creatures;
import java.awt.*;


public abstract class Entity {
	protected float posx,posy;
	

	
	public  Entity(float x,float y){
		posx=x;
		posy=y;
		
	}
	protected abstract void update();
	protected abstract void processimage(Graphics g);
	
}
