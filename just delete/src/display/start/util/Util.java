package display.start.util;

import java.io.FileInputStream;

public class Util {
	
	public static String getMap(String path){
	
		StringBuilder b=new StringBuilder();
		try{FileInputStream f=new FileInputStream(path);
		
		int x;
		do{
			x=f.read();
			if(x!=-1)b.append((char)x);
		}while(x!=-1);
		
		
		}catch(Exception e){
			
		}
		return b.toString() ;
	}
}
