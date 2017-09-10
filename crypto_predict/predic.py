import json,urllib,urllib2,time,math,os
import pandas as pd
from sklearn import preprocessing,cross_validation,svm
from sklearn.linear_model import LinearRegression

# import matplotlib.pyplot as plt



import numpy as np

os.system("clear")
to_find=raw_input("Enter Coin to find : BTC-KMD = komodo, BTC-ETH = ethereum BTC-OMG = omiseGo etc. default is ethereum (Enter to proceed with ethereum)")
if to_find=="":
	to_find="BTC-ETH"

try:
	raw_data=urllib2.urlopen("https://bittrex.com/Api/v2.0/pub/market/GetTicks?marketName="+str(to_find)+"&tickInterval=hour&_="+str(int(time.time())))
except:
	print "Error"
	exit()
all_data=json.load(raw_data)
data=all_data['result']

df=pd.DataFrame(data)
df=df[['C','H','L','O']]
df['HL_PCT']=((df['H']-df['C'])/df['C'])*100
df['PCT_C']=((df['C']-df['O'])/df['O'])*100
df=df[['C','H','L','O','PCT_C','HL_PCT']]
to_find='C'


try:
	lookup=raw_input("Enter hours to lookup for default = 2 (Enter to proceed with next 2 hours)")
	asked=(lookup)
	if lookup=="":
		lookup=0.002
		asked=2
	else:
		lookup=float(lookup)/len(df)

except:
	print "error"
	exit()

label_out=int(math.ceil(lookup*len(df))) # 3 hours ahead tk ka btata hai

df['label']=df['C'].shift(-label_out)

X=np.array(df.drop(['label'],1))
X_later=X[-label_out:]


Y_later=(np.array(df['C']))[-label_out:]

X=X[:-label_out]
df.dropna(inplace=True)

# X=preprocessing.scale(X)

Y=np.array(df['label'])     # close price predict


X_train,X_test,Y_train,Y_test=cross_validation.train_test_split(X,Y,test_size=0.2)


clf=LinearRegression()

clf.fit(X_train,Y_train)

accuracy=clf.score(X_test,Y_test)

forecast=clf.predict(X_later)


prev=forecast[0]
prev_=Y_later[0]
d1,d2=0,0
for i in range(1,len(forecast)):
	print forecast[i],"is forecast closed price  and found ",Y_later[i]," in next "+str(asked)+" hour"

res=forecast[-1]-Y_later[-1]
idc="increase" if res>0 else "decrease"
print "\npresent is ",forecast[-1] ," that is" ,res," "+idc+" in "+str(asked)+" hours\n"
print "I am ",accuracy*100," % accurate at the moment"


