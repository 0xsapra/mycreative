package display.start.creatures;

import java.awt.Graphics;

import display.start.Gamecreater;
import display.start.resources.ProperImage;

public class Player extends Creatures {
	Gamecreater game;
	public Player(Gamecreater game,int x,int y){
		super(x,y);
		this.game=game;
	}

	@Override
	public void update() {
		if(game.getInput().u){
			posy-=2;
		}
		if(game.getInput().d){
			posy+=2;
		}
		if(game.getInput().l){
			posx-=2;
		}
		if(game.getInput().r){
			posx+=2;
		}
	}

	@Override
	public void processimage(Graphics g) {
		g.drawImage(ProperImage.Player,(int)posx,(int)posy,null);
	}
}
