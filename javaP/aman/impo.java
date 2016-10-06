import java.io.*;

class Exc extends Exception {
Exc(String a){
	System.out.print(a);
}
Exc (){
	
}
}



class Mian {
static void add(int x){
	try{
	if(x<10){
		throw new Exc("value");
	}
	else{
	throw new Exception();
	}}
	catch(Exc e){
	
		System.out.print("what thre fuck aman");
	}catch(Exception e){
		System.out.print("mei chala");
	}
}

public static void main(String args[]) throws Exc{
//add(2);
try{int x;
FileInputStream a=new FileInputStream("j.txt");
FileOutputStream a1=new FileOutputStream("m.txt");
do{
x=a.read();
//System.out.print((char)x);
a1.write((char)x);

}while(x!=-1);



a.close();
a1.close();
}}
}

