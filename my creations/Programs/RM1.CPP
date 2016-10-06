#include<stdio.h>
#include<conio.h>
#include<math.h>

float f(float x){ return (x*x*x)+(x*x)-1; }
float F(float x){ return sqrt(1-(x*x*x)); }

void main()
	{
	int i,n;
	float a,b,x;
	clrscr();
	printf("The Equation is : x^3+x^2-1 \n");
	printf("Enter The Valid Range :\n");
	scanf("%f%f",&a,&b);
	if(f(a)*f(b)<0)
		{
		printf("Enter The No. Of Iterations : ");
		scanf("%f",&n);
		x=(a+b)/2;
		printf("X%d = %.2f\n",0,x);
		for(i=1;i<=n;i++)
			{
			x=F(x);
			printf("X%d = %.4f\n",i,x);
			}
		}
	else
		printf("Not the Valid Range");
	getch();
	}