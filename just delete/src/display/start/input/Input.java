package display.start.input;

import java.awt.event.KeyEvent;
import java.awt.event.KeyListener;

public class Input implements KeyListener{
	
	public boolean[] itake;
	public boolean u,d,l,r;
	public Input(){
		itake=new boolean[256];
	}
	public void checker(){
		u=itake[KeyEvent.VK_W];
		d=itake[KeyEvent.VK_DOWN];
		l=itake[KeyEvent.VK_LEFT];
		r=itake[KeyEvent.VK_RIGHT];
	}
	
	@Override
	public void keyTyped(KeyEvent e) {
		itake[e.getKeyCode()]=true;
	
	}

	@Override
	public void keyPressed(KeyEvent e) {
		itake[e.getKeyCode()]=false;
	}

	@Override
	public void keyReleased(KeyEvent e) {
		
	}

	
}
