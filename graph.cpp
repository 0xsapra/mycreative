#include<stdio.h>
#include<stdlib.h>

struct edge{
	int weight;
	struct node* next_node;
	};

struct node{
	char name;
	struct edge edge_number[10];
	};


struct node* head[10];

void prepare(int num){
	int x=97;
	for(int k=0;k<num;k++){
	struct node * temp=(struct node*)malloc(sizeof(struct node));
	temp->name=char(x++);
	head[k]=temp;
	}

	}


void insert(char nodename,char name,int value){
	int nodenamevalue=int(nodename)-97;
	int insertingnodevalue=int(name)-97;
	struct edge edger;
	edger.weight=value;
	edger.next_node=head[insertingnodevalue];

	head[nodenamevalue]->edge_number[insertingnodevalue]=edger;

}



int main(){
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

	// printing the tree

	// printf("%d,",head[x]->edge_number[y].weight);  x=0 for a,1 for b   and y=0 for a , 1 for b and so onn..
	printf("Fowming the tree,\ntree formation complete, now from wht node to other distance is needed\n");
	printf("from\n");
	scanf("%c",&top);
	printf("to\n");
	scanf("%c",&end);
	printf("%d,",head[int(top)-97]->edge_number[int(end)-97].weight);

return 0;

}
