package display.start.states;

import java.awt.Graphics;

import display.start.Gamecreater;

public class Menuustate extends state {

	
	
	
	Menuustate(Gamecreater game) {
		super(game);
		// TODO Auto-generated constructor stub
	}

	@Override
	public void processimage(Graphics g) {
	g.clearRect(0, 0, 1080, 720);
	g.drawRect(5, 5, 1000, 700);
	g.drawString("wanna play game", 15,15 );
	}

	@Override
	public void update() {
	
	}

}
