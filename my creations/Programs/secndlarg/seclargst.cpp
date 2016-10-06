#include <iostream>

using namespace std;


int main()
{
    int i,min;
    int a[5];cout<<"enter the numbers";
    for(i=0;i<5;i++)
    {
        cin>>a[i];
    }
for(int i=0;i<5;i++)
   {
       if(a[i]>min)
       {
           min=a[i];
       }

   }
    int x=min;
    min=0;
    for(i=0;i<5;i++)
    {
        if(a[i]>min && a[i]!=x)
        {
            min=a[i];
        }
    }
    cout<<"second largest number "<<min;
    return 0;
}
