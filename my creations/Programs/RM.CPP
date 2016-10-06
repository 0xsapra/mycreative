#include<iostream.h>
#include<conio.h>
#include<math.h>

#define f(x) (3*x)-cos(x)-1

float x(float x0,float x1)
	{
	float t = f(x1)-f(x0);
	float temp = x0-((x1-x0)/t)*f(x0);
	return temp;
	}

void main()
	{
	clrscr();
	float a,b;
	int i,n;
	for(i=0;i<20;i++)
		{
		a=i;
		b=i+1;
		if(f(a)*f(b)<0)
			{
			break;
			}
		}

	cout<<"The Range is :"<<a<<" and "<<b<<endl;

	float res = x(a,b);

	cout<<"Enter No. of Iterations :";
	cin>>n;

	for(i=1;i<=n;i++)
		{
		if(res<0)
			{
			a = res;
			res = x(a,b);
			//printf(" %f ",res);
			}
		else if(res>0)
			{
			b = res;
			res = x(a,b);
			//printf(" %f ",res);
			}
		cout<<"\nThe root at iteration no."<<i<<" is :"<<res;
		}
	getch();
	}
