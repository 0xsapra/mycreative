def calca(effective,frm,to,total):
    defect=1-effective
    x=0
    for i in range(int(frm),int(to)+1):
        x+=((effective**i)*defect**(total-i))*(fact(total,i,total-i))
    return x

fact =lambda total,end,strt : 1 if total==strt else factor(total,(total-strt))/facto(end)


def factor(x,y):
	u=x
	for i in range (1,int(y)):
		u*=x-1
		x=x-1
	return u

facto=lambda x: 1 if x==1 else x*facto(x-1)


x=float(raw_input("enter effective probability"))
y=int(raw_input("enter from which point "))
z=int(raw_input("enter to which point "))
q=float(raw_input("enter total posibile cases"))
print calca(x,y,z,q)

#print  calca(0.5,0,7,12)
# print  calca(0.5,8,8,12)
