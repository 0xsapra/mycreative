package display.start.worlds;

import java.awt.Graphics;

import display.start.tile.Tiles;

public class World {
	
	private String path;
	private int[][] Tile;
	private int Width,Height;
	public World(String path){
		this.path=path;
		loadworld(path);
	}
	public void tick(){
		
	}
	public void render (Graphics g){
		for(int i=0;i<5;i++){
			for(int j=0;j<5;j++){
				Tiles.tile[Tile[i][j]].render(g, i*200, j*250);
			}
		}
	}
	void loadworld(String path)
	{
		Width=Height=5;
		Tile=new int[Width][Height];
		for(int i=0;i<5;i++){
			for(int j=0;j<5;j++){
				Tile[i][j]=0;
			}
		}
	}
	
	
}
