#include <iostream>

using namespace std;
struct stu
{
    int roll;
    char name[20];
    char sec;

};

int main()
{
    stu student[5],temp;
    for(int i=0;i<5;i++)
    {
        cout<<"Enter Student Name ";
        cin>>student[i].name;
        cout<<endl;
        cout<<"Enter roll no.";
        cin>>student[i].roll;
        cout<<endl;
        cout<<"Enter Section ";
        cin>>student[i].sec;
        cout<<endl;
    }
    for(int i=0;i<5;i++)
    {
        cout<<"Student Name ";
        cout<<student[i].name;cout<<endl;
        cout<<"Roll no. ";
        cout<<student[i].roll;cout<<endl;
        cout<<"Section ";
        cout<<student[i].sec;cout<<endl;
    }

    for(int i=0;i<4;i++)
    {
        for(int j=0;j<(4-i);j++)
        {
            if(student[j].roll>student[j+1].roll)
            {
                temp=student[j];

                student[j]=student[j+1];
                student[j+1]=temp;
            }

        }
    }
    cout<<"Sorted Structure Is \n \n \n";
     for(int i=0;i<5;i++)
    {
        cout<<"Student Name ";
        cout<<student[i].name;cout<<endl;
        cout<<"Roll no. ";
        cout<<student[i].roll;cout<<endl;
        cout<<"Section ";
        cout<<student[i].sec;cout<<endl;
    }


    return 0;
}
