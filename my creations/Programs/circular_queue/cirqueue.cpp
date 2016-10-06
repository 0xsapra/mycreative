#include <iostream>
#include <process.h>
using namespace std;
class cq
{
public:
    int front,rear,arr[10],maxx,value;
    cq()
    {
        front = -1;
        rear = -1;
        maxx=10;
    }
    void insert();
    void del();
    void display();
};
void cq::insert()
{
    cout<<"\nEnter no. to insert";
    cin>>value;
    if(front==0 && rear==maxx-1) //overflow_error
    {
        cout<<"\nOverflow";

    }
    else if(front == -1 && rear == -1) //initial condition when no elemnts are present
    {
        front=0;
        rear=0;
    }
    else if(rear == maxx-1)
    {
        rear=0;
    }
    else{
        rear++;
    }
    arr[rear]=value;
}
void cq::del()
{
    if(front== -1)
    {
        cout<<"Underflow";
    }
    else{
        if(front==rear)
        {
         front=-1;
        rear=-1;
        }
        else if(front==maxx-1)
            front=0;
        else
            front++;
    }

}
void cq::display()
{
    int i;
    if(front==-1)
    {
        cout<<"Queue is empty";
    }
    else if(rear<front)
    {
        for(i=front;i<=maxx-1;i++)
            cout<<endl<<arr[i];
        for(i=0;i<=rear;i++)
            cout<<endl<<arr[i];

    }else
    {
        for(i=front;i<=rear;i++)
            cout<<endl<<arr[i];
    }
}
int main()
{
    int x=0;
    cq obj;
    cout<<"**********Circular Queue**********"<<endl;
    cout<<"Enter your choice\n\n";
    while(x<4)
    {
        cout<<"\n1.Insert in queue\n";
        cout<<"2.Deletion in queue\n";
        cout<<"3.Display queue\n";
        cout<<"4.Exit\n";
        cin>>x;
        switch(x)
        {
            case 1:
                obj.insert();
                cout<<"After insertion Queue is \n";
                obj.display();
                break;
            case 2:
                obj.del();
                cout<<"After deletion Queue is \n";
                obj.display();
                break;
            case 3:
                obj.display();
                break;
          default:
                cout<<"\nInvalid case\n";
        }
    }
    return 0;
}
