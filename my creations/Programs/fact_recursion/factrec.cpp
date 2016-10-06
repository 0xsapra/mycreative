#include <iostream>

using namespace std;
int fact(int x)
{
    if(x==1)
    {
        return 1;

    }else{

    return x*fact(x-1);
    }
}

int main()
{
    cout<<"***************Factorial Calculation using Recursion***************\n\n\n";
    int no=0;
    cout << "Enter the no. whose factorial you want to find \n";
    cin>>no;
    cout<<"\nThe factorial of number "<<no<<" is "<<fact(no)<<"\n";
    return 0;
}
