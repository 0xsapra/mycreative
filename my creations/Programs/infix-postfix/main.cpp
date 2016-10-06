#include <iostream>

using namespace std;
class stack
{
public:
    char s[50];
    int top,max;

    stack()
    {
        top = -1;
        max = 50;
    }
    void push(char x);
    char pop();
    int isEmpty();
    int isFull();
};
void stack::push(char x)
{
    if(isFull())
        cout<<"OverFlow";
    else
    {
        top++;
        s[top]=x;
    }
}
char stack::pop()
{
    char temp;
    if(isEmpty())
        cout<<"Underflow";
    else
    {
        temp=s[top];
        top--;
    }
    return temp;
}
int stack::isEmpty()
{
    if(top==-1)
        return 1;
    else
        return 0;
}
int stack::isFull()
{
    if(top==max-1)
        return 1;
    else
        return 0;
}
class expression
{
public:
    char infix[50],postfix[50];

    void input()
    {
        cout<<"Enter Infix Expression\n";
        cin>>infix;
    }
    int white_space(char x);
    void convert();
    int prec(char ch);
};
int expression::white_space(char x)
{
    if(x=='/t'|| x=='/n' || x== '.')
        return 1;
    else
        return 0;
}
int expression::prec(char ch)
{
    switch(ch)
    {
    case '^':
        return 5;
        break;
    case '*':
        return 4;
        break;
    case '/':
        return 3;
        break;
    case '+':
        return 2;
        break;
    case '-':
        return 1;
        break;
    case '(':
        return 0;
        break;
    default:
        return -1;
    }
}
void expression::convert()
{
    stack s;
    int precedence,p;
    char entry1,entry2; //entry1 for infix xhar entry 2 for stack char
    p=0;
    for(int i=0; infix[i]!='\0'; i++)
    {

        entry1=infix[i];
        if(!white_space(entry1))
        {
            cout<<"entry 1 is "<<entry1<<endl;
            switch(entry1)
            {
            case'(':
                s.push(entry1);
                break;
            case ')':
                while((entry2=s.pop())!='(')
                    postfix[p++]=entry2;
                break;
            case '^' :
            case '-' :
            case '*' :
            case '/' :
            case '+' :
                if(!s.isEmpty())
                {
                    precedence = prec(entry1);
                    entry2=s.pop();
                    while(precedence < prec(entry2))
                    {
                        postfix[p++]=entry2;
                        entry2=s.pop();
                    }

                    s.push(entry2);
                    s.push(entry1);
                }
                break;
            default:
                cout<<"In default conditions "<<entry1<<endl;
                postfix[p++]=entry1;
            }
        }
    }
    while(!s.isEmpty())
    {
        postfix[p++]=s.pop();
    }
    postfix[p]='\0';

}
int main()
{

    char ch='y';
    expression exp;
    while(ch=='y')
    {
        exp.input();
        exp.convert();
        cout<<"Postfix is :-> ";
        cout<<exp.postfix;
        cout<<"\nDo you want to continue ?? ";
        cin>>ch;
    }

    return 0;
}
