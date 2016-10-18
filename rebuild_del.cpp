#include<stdio.h>
#include<stdlib.h>
struct edge{
int weight;
struct node* next;
};

struct node{
char name;
struct edge edger[10];
};


struct node* head[10];

void prepare(int v){
int n=97;
for(int i=0;i<v;i++){
struct node* temp=(struct node*)malloc(sizeof(struct node));
temp->name=char(n++);
head[i]=temp;
}
}

void insert(char strt_node,char d_node,int value){
int x=int(strt_node)-97;
int y=int(d_node)-97;
struct edge edger;
edger.weight=value;
edger.next=head[y];
head[x]->edger[y]=edger;
}

int main()
{
printf("say the number of nodes you want\n");
	
	//preparing nodes of tree
	int number=0,x1;
	char top;char end;
	scanf("%d",&number);
	 prepare(number);
	//inserting the values
	
	printf("we are nameing edges as a,b,c ..\n");
	
	for (int i = 0; i < number; i++)
		for(int j=0;j<number;j++){
			if(i==j)continue;
			if(i>j){continue;}
			printf("enter edge distance from %c to %c\n",(97+i),(97+j) );
			scanf("%d",&x1);
			insert(char(97+i),char(97+j),x1);
		
	}

return 0;
}
