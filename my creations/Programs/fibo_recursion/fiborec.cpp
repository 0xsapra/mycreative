#include <iostream>

using namespace std;

int fibo(int x)
{
    if(x==1)
        return 0;
    if(x==2)
        return 1;
    else{

        return fibo(x-1)+fibo(x-2);
    }

}

int main()
{
    cout<<"***************Fibonacci Series using Recursion***************\n\n\n";
    int no;
    cout << "Enter the no. of terms in series \n" << endl;
    cin>>no;
    cout<<"Series is :- \n";
    for (int i=1;i<=no;i++)
    {
        cout<<fibo(i)<<"\t";
    }

    return 0;
}
