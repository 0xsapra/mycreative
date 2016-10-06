package display.start.states;

import java.awt.Graphics;

import display.start.Gamecreater;

public abstract class state {
	Gamecreater game;
	
	public static state currstate=null;
	
	public state(Gamecreater game){
		this.game=game;
	}
	public static void setstate(state s){
		currstate=s;
	}
	public static state getstate(){
		return currstate;
	}
	
	public abstract void processimage(Graphics g);
	public abstract void update();
}
