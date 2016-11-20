def universe():
	while 1:
		i=int(raw_input("enter number"))
		if(i<99 and i!=42):
			print i

def add():

	num1 = int(raw_input()) 
	num2 = int(raw_input()) 
	print num1
	print num2
	if num1<200 and num2<200:
		sum = int(num1) + int(num2); 
		print(sum); 

        
def reverse_add():
    length=int(raw_input())
    for i in range(length):
        print get_and_add()
        
def get_and_add():
    a,b=str(raw_input()).split()
    m=rev(a,b)
    print str(m[0])+" "+str(m[1])
    val=m[0]+m[1]
    print val
    return rev(val)[0]
    
    
def rev(a,b=0):
    a1=int(str(a)[::-1])
    b1=int(str(b)[::-1])
    return [a1,b1]





if __name__=="__main__":
	reverse_add()
