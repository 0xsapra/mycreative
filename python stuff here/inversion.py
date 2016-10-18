inverse=0
def inversion(a):
	if len(a)<=1:
		return 
	mid=len(a)/2
	l1=[1]*mid
	r1=[1]*(len(a)-mid)
	l1=a[0:mid]
	r1=a[mid:]
	inversion(l1)
	inversion(r1)
	invert(l1,r1,a)

def invert(left,right,a):
	global inverse
	i,j,k=0,0,0
	while(i<len(left) and j<len(right)):
		if left[i]<right[j]:
			a[k]=left[i]
			k=k+1
			i=i+1
		elif left[i]>right[j]:
			inverse+=(len(left)-i)
			a[k]=right[j]
			k=k+1
			j=j+1
	while i<len(left):
		a[k]=left[i]
		k=k+1
		i=i+1
	while j<len(right):
		a[k]=right[j]
		k=k+1
		j=j+1

	


def display(a):
	for i in a:
		print i

if __name__=="__main__":
	a=[5,4,3,2,1]
	inversion(a)
	print inverse