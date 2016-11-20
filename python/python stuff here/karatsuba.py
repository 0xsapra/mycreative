import math

def karatsuba(x,y):
    if x<10 and y<10:
          return x*y
    else:
            if x>y:
                d=pow(10,len(str(x))/2)
            else:
                d=pow(10,len(str(y))/2)
    a=x/d
    b=x%d
    c=y/d
    d1=y%d
    ac=karatsuba(a,c)
    bd=karatsuba(b,d1)
    e = a+b
    f=c+d1
    ef=karatsuba(e,f)
    return ((ac*pow(d,2))+bd+(d*(ef-bd-ac)))

if __name__=="__main__":
	print karatsuba(11,11)
