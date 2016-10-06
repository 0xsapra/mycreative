package display.start.states;

import java.awt.Graphics;

import display.start.Gamecreater;
import display.start.creatures.Player;
import display.start.worlds.World;


public class gamestate extends state{
	Player a;
	World world;
	public gamestate(Gamecreater game) {
		super(game);
		a=new Player(game,10,10);
		world=new World("");
	}

	
	@Override
	public void processimage(Graphics g) {
		world.render(g);
		a.processimage(g);
		
	}

	@Override
	public void update() {
	
		a.update();
	}

}
