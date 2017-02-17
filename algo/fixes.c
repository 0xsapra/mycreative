#include<stdio.h>
#include "stack.h"
#include<string.h>

char pref[]= {'*','/','+','-'};

// added the expression to head
void push(char ch[],char data){
	ch[strlen(ch)]=data;
}
void printArray(char a[]){

	for (int i = 0; i < strlen(a); i++){
		printf("%c\n",a[i] );
	}
}


void prefix(char infix[]){

	static char expo[100];
	char vals[100]={};

	printf("%d\n",strlen(vals));
	return;
	while(top()){

		char temp=pop();
		// now loop runs size of expresion time given by user

		for (int i = 0; i < strlen(pref); i++){
			if(temp==pref[i]){
				


				goto here;
			}
		}

		expo[counter++]=temp;
		here:
			printf("\n");
	}
	printArray(expo);
}

int main(){

	int i=0;
	char infix[100];

	printf("Please enter the expression to change to prefix\n");
	gets(infix);
	for (i = 0; i < strlen(infix); i++){
		add(int(infix[i]));
	}	
	print();
	prefix(infix);

	return 0;
}