#include<stdio.h>
#include<stdlib.h>

struct node{
	struct node* linker;
	int data; 
};


struct node * insert(struct node* head,int x){
	struct node* temp=(struct node*)(malloc(sizeof(struct node)));
	temp->data=x;
	temp->linker=head;
	head=temp;
	return head;
}

void Print(struct node* head){
	struct node* temp=head;
	while(temp!=NULL){
		printf("%d\n",temp->data );
		temp=temp->linker;
	}
}
 struct node* insertn(struct node* head,int data,int n){
	struct node* temp=(struct node*)(malloc(sizeof(struct node)));
	(*temp).data=data;
	(*temp).linker=NULL;
	if(n==1){
		head->linker=temp;
		head=temp;
		return head;
	}
	struct node* temp1=head;
	for (int i = 0; i < n-2; i++)
	{temp1=temp1->linker;}
	
	temp->linker=temp1->linker;
	temp1->linker=temp;
	return head;

 }
 struct node* delete(struct node* head,int n)
 {
 	 struct node* temp=head;

 	if(n==1){
 		head=head->linker;
 		free(temp);
 		return head;
 	}
 	for (int i = 0; i < n-2; i++)
 	{
 		temp=temp->linker;
 	}
 	struct node *temp2=temp->linker;
 	temp->linker=temp2->linker;
 	free(temp2);
 	return head;
 }
int main(int argc, char const *argv[])
{
	struct node* head=NULL;

	head=insert(head,23);
	head=insert(head,33);
	head=insert(head,44);
	head=insertn(head,2,2);
	head=delete(head,3);
	Print(head);
	return 0;
}