import urllib,urllib2
from cookielib import CookieJar
import threading
import re
import time

filer=open('extract.txt')
tex=filer.read()
mainer=re.findall(r'class="tracked".+>(\w.*)</a>',tex)

thread_maintain=0
    

def find_wordpress(i):
        global thread_maintain
        try:
            html=opener.open(i)
            if "wp-" in (str(html.read()))[:4000]:
                print html.url,"is a wordpress site"
                html.close()
                opener.close()
                thread_maintain=thread_maintain-1
                return
            else:
                thread_maintain=thread_maintain-1
                print i,"is not wordpress"
        except:
            try:
                html=urllib.urlopen(i)
                if "wp-" in html.read():
                    print i,"is wordpress"
                    html.close()
                    thread_maintain=thread_maintain-1
                    return
            except:
                thread_maintain=thread_maintain-1
                print "UNABLE TO FIND FOR",i
        thread_maintain=thread_maintain-1

try:
    curs=open("file.txt",'r')
    content=[]
    for i in curs.readlines():
        content.append(i.strip("\n"))
except:
    print "file not found or some error"
cj=CookieJar()
opener=urllib2.build_opener(urllib2.HTTPCookieProcessor(cj))

for i in content:
    if len(i.strip(' '))<=1:
        continue
#    if thread_maintain>20:
#        thread_maintain=0
#        print "starte"
#        time.sleep(5000)
    thr=threading.Thread(target=find_wordpress,args=(i,))
    thr.start()
    thread_maintain=thread_maintain+1

    
