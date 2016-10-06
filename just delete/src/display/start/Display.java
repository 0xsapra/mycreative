package display.start;
import java.awt.*;
import javax.swing.*;
public class Display {
	//here are imports objects
	private JFrame frame;
	private Canvas canvas;
	//Class's variales
	private String title;private int width,height;
	
	
	
	Display(String title,int x,int y){
		this.title=title;
		width=x;
		height=y;
		makeframe();
	}
	private void makeframe(){
		frame=new JFrame(title);
		frame.setSize(width, height);
		frame.setVisible(true);
		frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		frame.setResizable(true);
		frame.setLocationRelativeTo(null);
	
		canvas=new Canvas();
		canvas.setPreferredSize(new Dimension(width,height));
		canvas.setMaximumSize(new Dimension(width,height));
		canvas.setMinimumSize(new Dimension(width,height));
		canvas.setFocusable(false);
		
		frame.add(canvas);
		frame.pack();
		
	}
	public Canvas getC(){
		return canvas;
	}
	
	public JFrame getframe(){
		return frame;
	}
}
