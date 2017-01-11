#!/usr/bin/pyhton
import numpy as np

#programmers param
allofthepoints=[]
mains=[]
tints=[]
minimum=0
maximum=0

#required parameter
totalpiece=int(raw_input("enter total"))
findtint=int(raw_input("enter max tint"))

def adjustvals(x):
	minimum=8
	return int(x)-int(minimum)


print "enter the values \n"
while totalpiece != 0:
	a=raw_input().split()
	tints.append(a.pop())
	allofthepoints.append(a)
	totalpiece-=1
minimum=min(min(allofthepoints))

for i in allofthepoints:
	temp=map(adjustvals,i)
	mains.append(temp)

print mains,"\n"
maximum = max(max(mains))

bigarray=np.zeros((maximum,maximum))

val=0
for i in mains:

	bigarray[i[0]:i[2],i[1]:i[3]]=bigarray[i[0]:i[2],i[1]:i[3]]+int(tints[val])
	val+=1
print bigarray