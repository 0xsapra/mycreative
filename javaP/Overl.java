class OverLoad
{
	void test()
	{
		System.out.println("No parameters");
	}
	void test(int a)
	{
		System.out.println("a: " + a);
	}
	void test(int a, int b)
	{
		System.out.println("a and b: " + a + " " + b);
	}
	double test(double a)
	{
		System.out.println("double a: " + a);
		return a*a;
	}
}
class OverRide
{
	int i, j;
	double k,l;
	OverRide(int a, int b)
	{
		i = a;
		j = b;
		System.out.println("i and j: " + i + " " + j);
	}
	
	OverRide(double c,double d)
	{
		k = c;
		l = d;
		System.out.println("k and l: " + k + " " + l);
	}
}
class Overl
{
	public static void main(String args[])
	{
		OverLoad ob = new OverLoad();
		OverRide ob2=new OverRide(5,6);
		OverRide ob3=new OverRide(5.2,6.2);
		
		double result;

		ob.test();
		ob.test(10);
		ob.test(10, 20);
		result = ob.test(123.25);
		
		
		System.out.println("Result of ob.test(123.25): " + result);
	}
}

