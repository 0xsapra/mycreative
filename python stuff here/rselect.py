from sort import swap
from random import randint
import math

def rs(ar,start,end,index):
    if start>=end:
        return ar[start]
    
    a=partlo(ar,start,end)
    if a>index-1:
        return rs(ar,start,a-1,index)  #0 ,1, 2
    elif a<index-1:
        return rs(ar,a+1,end,index)
    else: return ar[a]
    
def partlo(ar,s,e):
#    p=randint(1,len(ar)-1)
    p=ar[int(math.floor((s+e)/2))]
    i=-1
    for k in ar:
        if k>p:
            pass
        elif k<=p:
            i+=1
            swap(i,ar.index(k),ar)
    swap(i,ar.index(p),ar)
    return ar.index(p)
    
if __name__=="__main__":
    a=[randint(1,100) for i in range(10)]
    print a
    x=int(raw_input("smallest number wanted is:"))
    print rs(a,0,len(a),x)
