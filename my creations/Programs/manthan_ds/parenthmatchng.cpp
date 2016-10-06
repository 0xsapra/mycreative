#include<iostream>
#include<conio.h>
#include<string.h>
using namespace std;
class par_chk
{
public:
    char stack[20],array[20];
    int top;
    par_chk()
    {
        cout<<"Enter string";
        cin>>array;
        top=0;
    }

    void check()
    {

        for(int i=0; i<strlen(array); i++)
        {
            if(array[i]=='{' )
            {

                stack[top]=array[i];
                top++;

                for(int j=0; j<strlen(array); j++)
                {
                    if(array[j]=='}')
                    {
                        pop();
                    }
                }
            }
            else if(array[i]=='(' )
            {

                stack[top]=array[i];
                top++;

                for(int j=0; j<strlen(array); j++)
                {
                    if(array[j]==')')
                    {
                        pop();
                    }
                }
            }
            else if(array[i]=='[' )
            {

                stack[top]=array[i];
                top++;

                for(int j=0; j<strlen(array); j++)
                {
                    if(array[j]==']')
                    {
                        pop();
                    }
                }
            }

        }
        if(top==0)
        {
            cout<<"Parenthesis Match";
        }
        else
        {
            cout<<"Parenthesis mismatch "<<top;
        }
    }
    void pop()
    {
        if(top==0)
        {
            cout<<"Underflow";
        }
        else
        {
            top--;
        }
    }

};
int main()
{
    par_chk s;
    s.check();
    return 0;
}
