package display.start.tile;

import java.awt.Graphics;
import java.awt.image.BufferedImage;

public class Tiles {
	
	//static
	public static Tiles[] tile=new Tiles[200];
	public static Tiles gt=new Grass(0);
	
	//
	BufferedImage Texture;
	public final int id;
	public Tiles(BufferedImage bi,int id){
		Texture=bi;
		this.id=id;
		tile[id]=this;
	}
	public void tick(){
		
	}
	public void render(Graphics g,int x,int y){
		g.drawImage(Texture, x, y, null);
	}

}
