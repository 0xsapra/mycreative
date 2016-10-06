#include <iostream>

using namespace std;
class Array
{

    int ary[15],maxsize,Size,location,value;
    public:

    Array()
    {
        maxsize=15;

    }
    void read();
    void Insert();
    void Delete();
    void traverse();
};
void Array::read()
{
    cout<<"Enter no. of elements you want to Insert\n";
    cin>>Size;
    for(int i=1;i<=Size;i++)
    {
        cout<<"Enter "<<i<<" th element \n";
        cin>>ary[i];

    }
}
void Array::Insert()
{
    int temp;
    cout<<"Enter location in which you want to insert \n";
    cin>>location;
    temp=Size;
    if(location>maxsize)
    {
        cout<<"No Such location \n";
    }else{
        cout<<"Enter value you want to insert \n";
        cin>>value;
    if(location>Size)
    {
        ary[location]=value;
        Size++;
    }else{

        while(temp>=location)
        {
            ary[temp+1]=ary[temp];
            temp--;
        }
        ary[location]=value;
        Size++;
    }

    }

}
void Array::Delete()
{
    int temp;
    cout<<"Enter the location from where you want to delete \n";
    cin>>location;
    temp=location;
    if(location>Size)
        cout<<"Underflow \n";
    else{
        while(temp<=Size)
        {
            ary[temp]=ary[temp+1];
            temp++;
        }
        Size--;
    }
}
void Array::traverse()
{
    for(int i=1;i<=Size;i++)
    {
        cout<<endl<<ary[i]<<endl;
    }
}
int main()
{
    Array obj;
    obj.read();
    obj.Insert();
    obj.traverse();
    obj.Delete();
    obj.traverse();


    return 0;
}
