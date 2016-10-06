#include <iostream>

using namespace std;

int main()
{
    int no=0,fact=1,temp=0;
    cout<<"***************Factorial Calculation using while loop***************\n\n\n";
    cout << "Enter the no. whose factorial you want to find \n";
    cin>>no;
    temp=no;
    while(temp>0)
    {
        fact=fact*temp;
        temp--;
    }
    cout<<"\nThe factorial of number "<<no<<" is "<<fact<<"\n";
    return 0;
}
