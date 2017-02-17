x=[4,6,22]
data=0
sum=26
flag=0

def f(d,i,flag):
	print d,i
	if d==0:
		print "found"
		return True
	if d<0 : 
		flag=1
		return
	if flag==1:	return
	
	for j in range(i,len(x)):
		f((d-x[j]),j+1,flag)
		

f(sum,0,flag)
	
