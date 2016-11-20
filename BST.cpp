#include<stdio.h>
#include<stdlib.h>
struct node{
	int data;
	struct node* left;
	struct node* right;

};

struct node* create(int data){
	struct node* temp=(struct node*)malloc(sizeof(struct node));
	temp->data=data;
	temp->left=temp->right=NULL;
	return temp;
}

struct node* insert(struct node* root,int data){
	if (root==NULL){
		root=create(data);	
	}
	else if(data<=(root)->data){
		(root)->left=insert(root->left,data);
	}
	else{
		root->right=insert(root->right,data);
	}
	return root;
}

int finder(struct node* root,int data){
	if((root)==NULL){return 0;}
	if(root->data==data){return 1;}
	if(root->data<data){return finder(root->right,data);}
	else{return finder(root->left,data);}
}

int main(){
	struct node* root=NULL;
	int d;
	root=insert(root,12);
	root=insert(root,13);
	root=insert(root,20);
	root=insert(root,15);
	printf("enter the data to find \n");		
	scanf(" %d",&d);
	printf("data is %d",d);
	if(finder(root,d)==1){
		printf("found u beach");
	}else{
	printf("fuk");
	}
return 0;
}
