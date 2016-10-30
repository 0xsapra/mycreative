import urllib,urllib2
from cookielib import CookieJar
import optparse
import numpy as np
import re

cj=CookieJar()
opener=urllib2.build_opener(urllib2.HTTPCookieProcessor(cj))
links=set([])
match_and_get_url=lambda url: set(re.findall(r'href="(h[\w:/\w.]+)',url))


def extract(seed):
	# if(len(links)==0):
	links=match_and_get_url(seed)
	mainLink=[i for i in links]
	for i in mainLink:
		y= get_text(i).read()
		li=set(match_and_get_url(y))
		links=links|li
	return links

def get_text(url):
	try:
		response=opener.open("http://"+url) 
	except:
		response=opener.open(url)
	return response


if __name__=="__main__":
	parser=optparse.OptionParser('usage :  use -u to specify url \n ex crawler.py -u www.google.com and -o for output file like -o out.txt')
	parser.add_option('-u','--url',dest='url' ,type="string",help="specify crawling url")
	parser.add_option('-o',dest='outp' ,type="string",help="specify output file")

	(options,args)=parser.parse_args()
	print parser.usage
	if options.url==None:
		print parser.usage
		exit(0)
	url=str(options.url)
	
	if options.outp==None:
		output="out.txt"
	else:
		output=options.outp
	print output
	refrence_url=get_text(url)
	
	all_data=extract(refrence_url.read())

	create_file=open(str(output),'w')
	for i in all_data:
		create_file.write(str(i)+'\n')
	create_file.close()

