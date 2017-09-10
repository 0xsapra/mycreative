#include <stdlib.h>

// structure def
struct node_head{
int data;
struct node_head* linker;
};

struct node_head* head;


// add values to list

void addEnd(int x){
struct node_head* temp=(struct node_head*)malloc(sizeof (struct node_head));
struct node_head* temp1=head;
temp->data=x;
temp->linker=NULL;
if(temp1==NULL){head=temp; return;}
while(temp1->linker!=NULL){temp1=temp1->linker;}
temp1->linker=temp;

}
void add(int x){
	struct node_head* temp=(struct node_head*)malloc(sizeof (struct node_head));

	temp->data=x;
	temp->linker=head;
	head=temp;
}

// print values if list
void print(){
struct node_head* temp1=head;
while(temp1!=NULL){
printf("%c\t",temp1->data);
temp1=temp1->linker;
}printf("\n");
}

// get top value
int top(){
struct node_head* temp1=head;
if(temp1==NULL){return 0;}
while(temp1->linker!=NULL){
	temp1=temp1->linker;
}
return temp1->data;
}

//	pop
int pop(){
	struct node_head* temp1=head;
	if(head==NULL){
		printf("Sorry can't pop from nothing\n");
		return 0;
	}
	if(head->linker==NULL){
		int send=head->data;
		head=NULL;
		free(temp1);
		return send;
	}
	while(((*temp1).linker)->linker !=NULL){
		temp1=temp1->linker;
	}
	struct node_head* temp=temp1->linker;
	int send=temp->data;
	temp1->linker=NULL;
	free(temp);
	return send;
} 