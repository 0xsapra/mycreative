package display.start.resources;

import java.awt.image.BufferedImage;

public class ProperImage {
	public static BufferedImage Player,esh,tile,danger;
	int y1=250,x1=200;
	
	BufferedImage bf;
		Resources x;
		public ProperImage(String path){
			x=new Resources("/yhi1.jpg");
			bf=x.image();
			
		}
		public void cropall(){
			Player=bf.getSubimage(0, 0, 200, 250);
			esh=bf.getSubimage(x1, 0, x1, y1);
			tile=bf.getSubimage(x1*2, 0, x1, y1);
			danger=bf.getSubimage(x1*3,0,x1,y1);
			
		}
		
	
}
