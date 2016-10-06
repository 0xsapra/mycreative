

import zipfile

x=open("rand.txt")
d=zipfile.ZipFile("t.zip")

for line in x.readlines():
     pw=line.strip("\n")
     try:
             d.extractall(pwd=pw)
             print "balle"
             print pw
             break
     except:
             pass
 
 