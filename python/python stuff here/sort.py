def selection(a):
    for i in range(len(a)):
        min=a[i]
        for j in range(i+1,len(a)):
            if a[j]<min:
                a=swap(i,j,a)
            
def insertion(a):
    for i in range(1,len(a)):
        taxy=a[i]
        hole=i
        while hole>0 and taxy<a[hole-1]:
            a[hole]=a[hole-1]
            hole-=1
        a[hole]=taxy
        
def swap(x,y,a):
    temp=a[x]
    a[x]=a[y]
    a[y]=temp
    return a

def display(a):
    for i in a:
        print i



def mergesort(a):
    if len(a)<=1:
        return
    mid=int(len(a)/2)
    a1=a[:mid]
    a2=a[mid:]
    mergesort(a1)
    mergesort(a2)
    merger(a1,a2,a)
    

if __name__=="__main__":
    a=[3,2,6,5,9,8,1]
    mergesort(a)
    display(a)