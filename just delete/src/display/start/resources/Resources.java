package display.start.resources;

import java.awt.image.BufferedImage;
import java.io.IOException;

import javax.imageio.ImageIO;

public class Resources {
	
	String path;
	public Resources(String path){
		this.path=path;
	}
	public BufferedImage image(){
		try {
			return ImageIO.read(Resources.class.getResource(path));
		} catch (IOException e) {
			System.out.println("Image not loaded properly..");
		}
		return null;
	}
}
