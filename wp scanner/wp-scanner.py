from cookielib import CookieJar
import sys,urllib,thread,time,urllib2,threading
wp_check="wp-content"
cj=CookieJar()
opener=urllib2.build_opener(urllib2.HTTPCookieProcessor(cj))
answer=open("output.txt","w")
def createData(urls):
	container=[]
	for i in urls:
		url=i.lower()
		if url[:4]!="http" and "www" not in url:
			url="http://www."+url
		elif "www" in url and url[:4]!="http":
			url="http://"+url
		container.append(url)
	return container

def checker(url1):
	try:
		data=opener.open(url1).read()[200:3000]
		if wp_check in data:
			print "\n",url1," is a WP site .. \n"
			answer.write(url1+"\n")
		else:
			print url1," is NOOOT a WP Site .. No No NOOO"
			opener.close()
	except:
		print " This is not a valid response fiving url ",url1
	
try:
	file=sys.argv[1]
except:
	print "Usage: file.py file.txt"
	exit()
if not file:
	print "Usage: file.py file.txt"

urls=open(file,"r").read().split()
urls=createData(urls)
for i in urls:
	thr=threading.Thread(target=checker,args=(i,))
	thr.start()
	# print i