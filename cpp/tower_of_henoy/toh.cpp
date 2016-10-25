#include<iostream>
#include<conio.h>
using namespace std;
void hanoi(int n,char s,char t,char d)
{
    if(n!=0)
    {
        hanoi(n-1,s,d,t);
        cout<<"\nMOVE DISK "<<n<<" FROM "<<s<<" TO "<<d;
        hanoi(n-1,t,s,d);
    }
}

int main()
{
    int n;
    char s='A',t='B',d='C';
    cout<<"***************Tower Of Hanoi***************\n\n\n";
    cout<<"Enter how many disks :\n\n";
    cin>>n;
    cout<<"\t\t\tTOWER OF HANOI"<<"\n\t\t\t---------------\n\n";
    hanoi(n,s,t,d);
    return 0;
}
