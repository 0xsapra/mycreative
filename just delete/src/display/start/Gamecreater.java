package display.start;
import java.awt.*;
import java.awt.event.KeyListener;
import java.awt.image.BufferStrategy;

import display.start.input.Input;
import display.start.resources.*;
import display.start.states.*;

public class Gamecreater implements Runnable{
	
	private Display display;
	Thread thread;
	public Graphics g;
	private BufferStrategy bs;
	Resources idraw;
	state newstate;
	ProperImage image;
	Input input=new Input();
	
	private boolean check=false;int x=10,y=10;
	
	
	private int width,height;private String title;
	
	public Gamecreater(String tit,int x,int y){
		title=tit;
		width=x;
		height=y;
		
		}
	
	public void run(){
		init();
		while(check){
			update();
			processimages();
			
		}
		stop();
	}
	
	void init(){
		display=new Display(title,width,height);
		image=new ProperImage("/yhi1.jpg");
		image.cropall();
		
		display.getframe().addKeyListener(input);
		newstate=new gamestate(this);
		// Menuustate for menu and gamestate for game state here, aply switch case 
		
		state.setstate(newstate);
	}
	void update(){
		input.checker();
		if(state.getstate()!=null){
			state.getstate().update();
		}
		
	}
	void processimages(){
		
		//this code is to create screens that we will use draw using the graphics,bs.getDrawGraphics bring
		//us the bufferscreen to draw on....
		
		bs=display.getC().getBufferStrategy();
		if(bs==null) {display.getC().createBufferStrategy(3); return;}
		g=bs.getDrawGraphics();
		//now we can draw..
		g.clearRect(0, 0, width, height);
		
		//now state manager manages all
		if(state.getstate()!=null){
			state.getstate().processimage(g);
		}
		//after draw, start mark important to displose our tool g and pack show the buferscren to scrren..
		bs.show();
		g.dispose();
	}
	
		
		
	public synchronized void start(){
		if(check){
			return;
		}
		check=true;
		thread=new Thread(this);
		thread.start();
	}
	
	public  Input getInput(){
		return input;
	}
	
	public synchronized void stop(){
		
		if(!check)
			return;
		check=false;
			try{
			thread.join();
		}catch(Exception e){
			
		}
	}
}
