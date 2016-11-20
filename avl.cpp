#include <iostream>

using namespace std;

struct Node {//Making the binary tree node
	int val;
	Node *right;
	Node *left;
	Node *parent;
	int height;
	Node(int value, Node *par){//The default constructor of the Node
		val = value;
		right = NULL;
		left = NULL;
		parent = par;
		height = 1;
	}
};

int heightOfNode(Node *node)
{
	if(node->left != NULL && node->right != NULL){
		return max(node->left->height, node->right->height);
	}else if(node->left != NULL){
		return node->left->height;
	}else if(node->right != NULL){ return node->right->height;}
	else return -1;
}

Node* leftRotate(Node *&node)//For Rotating the Node on the left
{
	cout << "L" << endl;
	Node *temp = node->right;
	temp->parent = node->parent;
	if(temp->parent != NULL){
		if(temp->parent->left == node){
			temp->parent->left = temp;
		}else temp->parent->right = temp;
	}
	node->right = temp->left;
	if(node->right != NULL){
		node->right->parent = node;
	}
	temp->left = node;
	node->parent = temp;
	node->height = heightOfNode(node);
	temp->height = heightOfNode(temp);
	return temp;
}

Node* rightRotate(Node *&node)
{

	Node *temp = node->left;
	Node* temp1=node;
		temp->parent =node->parent;  // 5 ka parent 10 and 10 ka parent null, so 5 kei parent ko null krdo joki node hai
	

	if(temp->parent != NULL){
		if(temp->parent->right == temp1){
			temp->parent->right = temp;
		}else temp->parent->left = temp;
	}
	
	temp1->left = temp->right;
	
	if(temp1->left != NULL){
		temp1->left->parent = temp1;
	}
	
	temp->right = temp1;
	temp1->parent = temp;
	temp1->height = heightOfNode(temp1);
	temp->height = heightOfNode(temp);

	return temp;
}

int heightDiff(Node *node)
{

	if(node->left != NULL && node->right != NULL){
		return node->left->height - node->right->height;
	}else if(node->left != NULL){
		return node->left->height;
	}else return 0-node->right->height;
}

Node* computeUp(Node *&node)
{
	node->height = 1+heightOfNode(node);
	int hd = heightDiff(node);
	cout << "node " << node->val << " dif " << hd << endl;
	if(hd > 1){
		if(heightDiff(node->left) < 0){
			node->left = leftRotate(node->left);
		}
		node = rightRotate(node);
		if(node->parent != NULL){
			return computeUp(node->parent);
		}else return node;
	}else if(hd < -1){
		if(heightDiff(node->right) > 0){
			node->right = rightRotate(node->right);
		}
		node = leftRotate(node);
		if(node->parent != NULL){
			return computeUp(node->parent);
		}else return node;
	}else{
		if(node->parent != NULL){
			return computeUp(node->parent);
		}else return node;
	}
}


Node* addNode(Node *&root, int val, Node *par)//Adding a new Node(new plane time), I am passing the node as a reference to pointer, as otherwise, it gets passed by value
{
	if(root == NULL){
		root = new Node(val, par);
		return computeUp(root->parent);
	}
	if(val < root->val){
		return addNode(root->left, val, root);
	}else {
		return addNode(root->right, val, root);
	}
}

bool treeCheckContains(Node *root, int val)//Check if the tree contains a specific val(val) within 'k' unit distance from each Node
{
	if(root == NULL){//If it reaches a empty Node, means it doesn't contain a value withing k units of val
		return true;
	}
	if(val == root->val){
		return false;
	}else if(val > root->val){
		return treeCheckContains(root->right, val);
	}else return treeCheckContains(root->left, val);
}

int main()
{
	cout << "Enter the first val ";//The first Node, ot the first plane
	int p; cin >> p;
	Node *root = new Node(p, NULL);
	int howManyVals;
	cout << "Enter the amount of values you wish to add ";//The amount of planes which are scheduled to land, i.e the time for their arrival and k min check
	cin >> howManyVals;
	while(howManyVals--){
		cout << "Enter next value to add ";//The time for next plane and k min
		int m;
		cin >> m;
		if(treeCheckContains(root, m)){//Checking if no other plane is scheduled in k mins
			cout << "Min check has succeded" << endl;
			root = addNode(root, m, NULL);//Adding the Node
			cout << "Item has been added" << endl;
		}else {cout << "MIN CHECK FAILED, TRY ADDING ANOTHER ITEM" << endl;
		++howManyVals;
		}
	}
}