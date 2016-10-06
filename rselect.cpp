#include <stdio.h>
#include <iostream>
#include <math.h>

using namespace std;
void prin(int x){
	printf("%d\n", x);
}
void prin(int *x){
	for (int i = 0; i < 6; i++)
	{
		prin(x[i]);
	}
}
int  partlo(int *ar,int size,int start,int end){
	int p;
	p=floor((start+end)/2);
	int j=-1;
	for (int i = 0; i < size; i++)
	{
		if(ar[i]>ar[p]){

		}
		else if(ar[i]<=ar[p]){
			j+=1;
			int temp=ar[i];
			ar[i]=ar[j];
			ar[j]=ar[i];
		}

	}
	int temp=ar[j];
	ar[j]=ar[p];
	ar[p]=temp;
	return j;

}


int rselect(int *ar,int size,int start,int end,int index){
	
	int p;
	if (start>=end){
		return ar[start];
	}
	p=partlo(ar,size,start,end);
	if (p>index-1){
		return rselect(ar,(p-1),start,p-1,index);
	}
	else if(p<index-1){
		return rselect(ar,p+1,p+1,end,index);
	}
	else
		return ar[p];
}

int main(int argc, char const *argv[])
{
	
	int a[]={4,2,3,9,8,7};
	printf("%d\n",rselect(a,(sizeof(a)/4),0,6,1));
	return 0;
}