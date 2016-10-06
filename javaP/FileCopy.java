import java.io.*;
class FileCopy
{
	public static void main(String args[])
	{
		FileInputStream Fin=null;
		FileOutputStream Fout=null;
		int i;
		try
		{
			try
			{
				Fin=new FileInputStream("a.txt");
			}
			catch(FileNotFoundException fe)
			{
				System.out.println("File Not Found");
			}
			try
			{
				Fout=new FileOutputStream("b.txt");
			}
			catch(FileNotFoundException fe)
			{
				System.out.println("File Not Found");
			}
		}
		catch(ArrayIndexOutOfBoundsException ae)
		{
			System.out.println(ae);
		}
		try
		{
			do
			{
				i=Fin.read();
				Fout.write(i);
			}while(i!=-1);
		}
		catch(IOException a)
		{
		System.out.println(a);
		}
	}
}
