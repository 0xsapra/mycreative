
def selection(a):
    for i in range(len(a)):
        max=a[i]
        for j in range(i+1,len(a)):
            if max<a[j]:
                a=swap(i,j,a)
def bubbl(a):
    for i in range(len(a)-1):
        if a[i]<a[i+1]:
            swap(i,i+1,a)

def mergesort(a):
    if len(a)<=1:
        return
    mid=len(a)/2
    n_a=[1]*mid
    n_a1=[1]*(len(a)-mid)
    for i in range(0,mid):
        n_a[i]=a[i]
    for j in range(mid,len(a)):
        n_a1[j-mid]=a[j]
    mergesort(n_a)
    mergesort(n_a1)
    merger(n_a,n_a1,a)

def merger(a,b,m):
    i=0
    j=0
    k=0
    while (i<len(a) and j<len(b)):
        if a[i]<b[j]:
            m[k]=a[i]
            k=k+1
            i=i+1
        elif a[i]>b[j]:
            m[k]=b[j]
            k=k+1
            j=j+1
        
    while i<len(a):
        m[k]=a[i]
        k=k+1
        i=i+1
    while j<len(b):
        m[k]=b[j]
        j=j+1
        k=k+1
    

def swap(x,y,a):
    temp=a[x]
    a[x]=a[y]
    a[y]=temp
    return a

def display(a):
    for i in a:
        print i
        
if __name__=="__main__":
    a=[4,3,6,1,7]
    mergesort (a)
    display(a)