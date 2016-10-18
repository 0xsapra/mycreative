
def selection(a):
    for i in range(len(a)):
        max=a[i]
        for j in range(i+1,len(a)):
            if max>a[j]:
                a=swap(i,j,a)
def bubbl(a):
    for j in range(len(a)-1):
        for i in range(len(a)-1):
            if a[i]>a[i+1]:
                a=swap(i,i+1,a)
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
def quicker(a,start,end):
    if start<end :
        index=partition(a,start,end)
        quicker(a,start,index)
        quicker(a,index+1,end)
        return a
def partition(a,start,end):
    pivot=a[(end)-1]
    pIndex=start-1
    for k in range(start,end):
        if a[k]<=pivot:
            pIndex+=1
            a[pIndex],a[k]=a[k],a[pIndex]
    a[pIndex],a[a.index(pivot)]=a[a.index(pivot)],a[pIndex]
    return pIndex
    
iquick=lambda a: a if len(a)<=1 else iquick([x for x in a if x>a[0]])+[a[0]]+iquick([x for x in a if x<a[0]])


if  __name__=="__main__":
    a=[4,3,6,9,1,7]

    print '''
    #####################################    
    #    welcome to sorting approches   #
    #    press                          #    
    #    1. for quick sort              #
    #    2. for selection sort          #
    #    3. for merge sort              #
    #    4.for bubble sort              #
    #    5.lowest quick sort            #
    #####################################
    '''
    choice=int(raw_input("input number is:"))
    print "---------------------"
    if choice==1:
        quicker (a,0,len(a)-1)
    elif choice==2:
        selection(a)
    elif choice==3:
        mergesort(a)
    elif choice==4:
        bubbl(a)
    else:
        iquick(a)
    
    display(a)
