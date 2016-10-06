# -*- coding: utf-8 -*-
def find_links(start):
    e=0
    while True:
          q=start.find("<a href=",e)
          if q==-1:
              break
          w=start.find('"',q)
          e=start.find('"',w+1)
          url=start[w+1:e]
          return url

 
x=input("here you go, input your url")
xx=find_links(x)
print xx
