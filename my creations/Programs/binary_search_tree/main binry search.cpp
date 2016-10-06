#include<iostream>
using namespace std;
struct bst
{
    bst * lchild;
    int info;
    bst * rchild;
};
class binary_tree
{
public:
    bst *par,*root,*temp,*ptr;

    binary_tree()
    {
        par=NULL;-
        root=NULL;
        temp=NULL;
    }
    void insert(int x);
    void displaypre();
    void delet(int x);
    void displayin(bst *pointerr);
    void displaypost(bst *pointerr);

};
void binary_tree::insert(int x)
{
    ptr=new bst;
    ptr->info=x;
    ptr->lchild=NULL;
    ptr->rchild=NULL;
    if(root==NULL)
    {
        root=ptr;

    }
    else
    {
        temp=root;
        while(temp!=NULL)
        {
            if(x < temp->info)
            {
                par=temp;
                temp=temp->lchild;
            }
            else
            {
                par=temp;
                temp=temp->rchild;
            }
        }
        if(x < par->info)
        {
            par->lchild=ptr;
        }
        else
        {
            par->rchild=ptr;
        }
    }
    cout<<"\nNode added successfully";

}
void binary_tree::displaypre()
{
    par=root;
    bst *stak[20];
    int top=1;
    stak[1]=NULL;
    cout<<"\nTraversing PreOrder:- \n";

    while(par!=NULL)
    {
        cout<<par->info<<endl;
        if(par->rchild!=NULL)
        {
            top+=1;
            stak[top]= par->rchild;

        }
        if(par->lchild!=NULL)
        {
            par=par->lchild;

        }
        else
        {
            par=stak[top];
            top=top-1;
        }
    }
}
void binary_tree::displayin(bst *temp)
{
    if(temp == NULL)
        return;
    displayin(temp->lchild);
    cout<<temp->info<<endl;
    displayin(temp->rchild);


}
void binary_tree::displaypost(bst *temp)
{
    if(temp==NULL)
        return;
    displaypost(temp->lchild);
    displaypost(temp->rchild);
    cout<<temp->info<<endl;
}
void binary_tree::delet(int x)
{
    bst *loc;
    temp=root;
    int flag=0;
    while(temp!=NULL)
    {
        if(x < temp->info)
        {
            par=temp;
            temp=temp->lchild;
        }
        else if( x > temp->info)
        {
            par=temp;
            temp=temp->rchild;
        }
        else if(x==temp->info)
        {
            loc = temp;
            flag=1;
            break;
        }
    }
    if(flag==0)
    {
        cout<<"Element not found";
        return;
    }else
    {
        if(loc->lchild==NULL && loc->rchild==NULL) //Condition 1 For Dlelting Element with no child
        {

            if(par->lchild->info==x)
            {
                 par->lchild=NULL;

            }else
                par->rchild=NULL;
        }
        //Condition 2 if ONly 1 child
        if((loc->lchild==NULL && loc->rchild!=NULL) && (loc->lchild!=NULL && loc->rchild==NULL))
        {
            if(par->lchild->info==x)
            {
                 par->lchild=NULL;

            }else
                par->rchild=NULL;
        }
    }

}


int main()
{
    binary_tree b1;
    b1.insert(20);
    b1.insert(10);
    b1.insert(30);
    b1.insert(9);
    b1.insert(15);
    b1.displaypre();
    cout<<"\nDisplaying In order\n";
    b1.displayin(b1.root);
    b1.delet(9);
    cout<<"\nDisplaying Post order\n";
    b1.displaypost(b1.root);
    b1.displaypre();
}
