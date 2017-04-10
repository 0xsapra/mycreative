// https://dmoj.ca/problem/ccc17s3
#include<stdio.h>
#include<math.h>

int main(){

	static int n,a[2000],size[4000],ans1;
	scanf("%d",&n);
	while(n--){
		int d;
		scanf("%d",&d);
		a[d]++;
	}
	// a=[0,1,1,1,1,0,0,0-----] for 1,2,3,4

	for (int i = 0; i<2000; i++){
		if(a[i])for (int j= i; j<2000 ; j++){
			if(i==j)size[i+j]+=a[i]/2;
			else{
				int data=a[i]>a[j]?a[j]:a[i];
				size[i+j]+=data;
			}
		}
	}

	for(int i=1;i<=4000;i++) {
        if(size[i] > ans1) {
            ans1 = size[i]; 
        } 
    }
    printf("%d\n", ans1);
	return 0;
}