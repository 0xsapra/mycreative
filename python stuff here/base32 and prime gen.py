import math
def prime_gen():
    x=int(raw_input("enter choices"))
    a=[]
    b=[]
    for i in range(x):
        u,v= str(raw_input()).split()
        a.append(int(u))
        b.append(int(v))
    w=0
    for j in range (x):
        for i in range(a[w],b[w]+1):
            if prime(i) :
                print i
        w+=1
        print 
def prime(x):
    if x==1: return False
    if x==2: return True
    t=int(math.ceil(math.sqrt(x)))
    for i in range(2,t+1):
        if x%i==0:
            return False
    return True
    
    

def TWOFIVE(a):
    a.reverse()
    d="23456789ABCDEFGHJKLMNPQRSTUVWXYZ"
    y=''
    w=0
    for i in a: 
        x= str(bin(i)[2:])
        for j in range(8-len(x)):
            x='0'+x
        y+=x
        w+=1
    while True:
        if len(y)%5!=0:
            y="0"+y
            continue
        break
    returner=""
    for i in range(len(y)/5):
        start=i*5
        returner+=(d[int(str(y[start:start+5]),2)])
    return returner[::-1]

if __name__=="__main__":
    print TWOFIVE([255,255,255,255,255])