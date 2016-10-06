#include<iostream>
#include<conio.h>

void show();
using namespace std;
struct node
{
    int info;
    node *next;
};
node *start,*ptr,*temp=NULL;
void insert_at_beg()
{
    ptr=new node;
    cout<<"Enter info you want ot enter ";
    cin>>ptr->info;
    cout<<endl;
    if(start==NULL)
    {
        start=ptr;
        ptr->next=NULL;
    }
    else
    {
        ptr->next=start;
        start=ptr;
    }
}
void insert_at_end()
{
    if(start!=NULL)
    {

        temp=start;
        while(temp->next!=NULL)     //A loop to find out last node
        {
            temp=temp->next;
        }
        ptr=new node;
        cout<<"Enter info you want ot enter ";
        cin>>ptr->info;
        cout<<endl;
        temp->next=ptr;
        ptr->next=NULL;
    }
    else{
            cout<<"\nPlease insert in beginning first ";
        }


}
void insert_middle()
{
    int no;

    if(start!=NULL && start->next!=NULL)
    {
        ptr=new node;
        temp=start;
        int flag=0;
        cout<<"Enter info you want ot enter ";
        cin>>ptr->info;
        cout<<endl;
        cout<<"After which node you want to insert \n";

        cin>>no;
        while(temp->info!=no)
        {
            if(temp->next==NULL)
            {
                cout<<"Node not found .\n";
                flag=1;
                break;
            }

            temp=temp->next;
        }
        if(flag==0)
        {
            ptr->next=temp->next;
            temp->next=ptr;
        }

    }
}
void delete_node()
{
    int no,flag=0;
    node *prev;
    temp=start;
    cout<<"Enter node you want to delete";
    cin>>no;
    while(temp->info!=no)
    {
        if(temp->next==NULL)
        {
            cout<<"Node not found .\n";
            flag=1;
            break;
        }
        prev=temp;
        temp=temp->next;

    }
    if(temp==start)
    {
        start=start->next;
    }else if(temp!=start && temp->next==NULL)
    {
        prev->next=NULL;
    }else
    {
        prev->next=temp->next;
    }

}
void show()
{
    ptr=start;
    while(ptr!=NULL)
    {
        cout<<ptr->info<<endl;
        ptr=ptr->next;
    }
}

int main()
{
    int x=0;

    cout<<"**********Linked List**********"<<endl;

    while(x<5)
    {

        cout<<"\n\n\n\n1.Insert in Begenning of linked List\n";
        cout<<"\n2.Insert in Middle Of linked list \n";
        cout<<"\n3.Insert in End of linked list \n";
        cout<<"\n4.Delete a node from linked List\n";
        cout<<"\n5.Exit\n";
        cout<<"\nEnter your choice  ";
        cin>>x;
        cout<<"\n\n\n";
        switch(x)
        {
        case 1:
            insert_at_beg();
            cout<<"After insertion Linked list is is \n";
            show();
            break;
        case 2:
            insert_middle();
            cout<<"After insertion Linked list is is \n";
            show();
            break;
        case 3:
            insert_at_end();
            cout<<"After insertion Linked list is is \n";
            show();
            break;
        case 4:
            delete_node();
            cout<<"After Deletion Linked list is is \n";
            show();
            break;
        default:
            cout<<"\nInvalid case\n";
        }
    }
    return 0;
}


