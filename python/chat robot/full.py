import sys,re,urllib2,json,base64

greeting=["hi","hello","hey","heyi","hei","heu"]
url="http://api.program-o.com/v2/chatbot/?bot_id=12&say="
url1="&convo_id=exampleusage_1231232&format=json"
if len(sys.argv)>0:
	data=base64.b64decode(sys.argv[1])
	x=''.join(data)
	y=[i for i in greeting if i.lower() in x.lower()]
	if y:
		print "HEY , BOT ROBOT HERE !!!"
		print "YOU can use These help from me :"
		print """Enter :
			1. for stock analyzse
			2. exit
		"""
	elif x=="1":
		print "Please enter the company name,year, month and date as (IBM 2016 1 1)"

	else:
		print json.load(urllib2.urlopen(url+x+url1))['botsay']

