#include <stdio.h>
#include <stdlib.h>
#include <string.h>


//structures
struct node{
    int data;
    struct node* link;
};
//global variables
struct node* head;


//functions....

//insert function
void insert(int data){
    struct node* temp=(struct node*)malloc(sizeof(struct node));
    (*temp).data=data;
    (*temp).link=head;
    head=temp;
    return;
}
//insert at end function
void insertend(int data)
{
    struct node* temp=(struct node*)malloc(sizeof(struct node));
    (*temp).data=data;
    (*temp).link=NULL;
    if(head==NULL){
        head=temp;
        return;
    }
    struct node* temp1=head;
    while(temp1->link!=NULL){
        temp1=temp1->link;
    }
    temp1->link=temp;
    return;
}
//print function
void Print(){
    printf("\n");
struct node* temp=head;
while(temp!=NULL){
    printf("%d",temp->data);
    temp=temp->link;
}
printf("\n");
return;
}

//delete funcion
void deletelist(int index){
int i=1;
struct node* temp=head;
for(i;i<index-1;i++){
    temp=temp->link;
}
struct node* freeit=temp->link;
temp->link=(*((*temp).link)).link;
free(freeit);
return;

}
//reverse list function
void reverselist(){

struct node* current=head;
struct node* prev=NULL;
struct node* next;

while((current)!=NULL){
    next=current->link;
    current->link=prev;
    prev=current;
    current=next;
}
head=prev;
return;
}

//main
int main()
{
    //variables by developer
    int a,b,i,del;
    char c,more;
    head=NULL;
    //program
    printf("Hello world! press z to get out...\n");

    do{
    more:printf("\n\n\n\nenter the number of terms you want in list at begin\n");
    scanf("%d",&a);
    printf("now enter the way: that is 1  for insert at begin and 2 for insert at end\n");
    scanf("%d",&b);
    int temp;
    printf("enter the %d numbers\n",a);
    if(b==1){
            for(i=0;i<a;i++){
                scanf("%d",&temp);
                insert(temp);
            }

    }else{
        for(i=0;i<a;i++){
                scanf("%d",&temp);
                insertend(temp);
            }
    }
    Print();
    printf("\nwant to add more numbers?'y' for yes and 'n' for no:\t");
    scanf(" %c",&more);
    if(more=='y'){
        goto more;
    }
    printf("want to delete a index number? 0 for no");
    scanf("%d",&del);
    label1:if(del){
    deletelist(del);
    printf("want to delete more thn enter the index to delete else 0");
    Print();
    scanf("%d",&del);
    goto label1;
    }

    Print();
    printf("enter z to get out and this fuker else andtthing else");
    scanf(" %c",&c);
    printf("input recorded");
    }while(c!='z');

    printf("\ncomming out of the list u bitch and reversing it tooo\n");
    reverselist();
    Print();
    return 0;
}