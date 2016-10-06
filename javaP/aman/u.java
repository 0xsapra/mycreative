import java.io.*;
class exc extends Exception{

}

class Extended extends Thread{
    static void input(int d){
        try{if (d<10){
            throw new exc();
        }}catch(exc e){
            System.out.println(e);
        }
}
    
    
public static void main(String[] args) throws Exception{
input(2);
    
Thread a=new Thread(){
	public void run(){
		for (int i=5; i<=0; i--) {
			System.out.print(i);
			try{
				sleep(1000);
			}catch(Exception e){

			}
	}
}

};
//a.start();
FileInputStream a4=new FileInputStream("j.txt");
int x;
do{
x=a4.read();
System.out.print((char)x);
//a1.write((char)x);

}while(x!=-1);



a4.close();
}
}

