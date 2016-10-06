import java.io.*;
class A extends Exception
{
	A(String S)
	{
		System.out.println(S); 
	}
}
class ExceptionMade
{
	static void method(double F) throws A
	{
		if(F==2.5)
			throw new A("Wrong Input");
		else
			System.out.println("Right Input"); 
	} 
	public static void main(String args[])
	{
		try
		{
			method(2.6);
			method(2.5);
		}
		catch(A e)
		{
			System.out.println("Exception");
		}
	}
}
