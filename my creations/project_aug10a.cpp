#include<stdio.h>
int main()
{
    printf("enter rows");
    int a,b,c=7,d[15],e=0;
    d[e]=1;
    //scanf("%d",&a);
    b=1;
    for(int i=1;i<5;i++)
    {
       
        for(int j=c;j>1;j--)
        {printf(" ");
            }c--;
        for(int k =1;k<=i;k++)
        {
            if(b==1)
            printf("%d",1);
            
            
            int z=b;
            while(z!=0){
                    
                d[e]=z%10;
                    e++;
                    z=z/10;
               
            printf("%d ",d[k]);}
            }
        b*=11;
        printf("\n");
    }
    printf("%d",d[3]);
}
