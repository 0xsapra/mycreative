#include <iostream>
#include <process.h>
using namespace std;
class queue
{
public:
    int front,rear,arr[10],maxx,value;
    queue()
    {
        front = -1;
        rear = -1;
        maxx=10;
    }
    void insert();
    void del();
    void display();
};
void queue::insert()
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
    else{
        rear++;
    }
    arr[rear]=value;
}
void queue::del()
{
    if(front== -1)
    {
        cout<<"Underflow";
     //   exit(0);
    }
    else{
        if(front==rear)
        {
         front=-1;
        rear=-1;
        }
        else
            front++;
    }

}
void queue::display()
{
    int i;
    if(front==-1)
    {
        cout<<"Queue is empty";
    }else{

        for(i=front;i<=rear;i++)
            cout<<endl<<arr[i];
    }
}
int main()
{
    int x=0;
    queue obj;
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
          //  case 4:
           //     exit(0);
            default:
                cout<<"\nInvalid case\n";
        }
    }
    return 0;
}
