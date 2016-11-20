import urllib,urllib2
from cookielib import CookieJar

cj=CookieJar()
opener=urllib2.build_opener(urllib2.HTTPCookieProcessor(cj))

html=opener.open("https://www.freekigames.com")
