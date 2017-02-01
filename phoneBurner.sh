#!/bin/bash

if [[ ( -z "$1" ) || ( -z "$2" ) || ( -z "$3" ) ]] 
	then
	echo -e "Use it in the format ./script.sh phone \"message to send\" numberOfTimes"
	echo -e "For eg, like this ./script.sh 4567354635 \"lol\" 10"
	exit
fi

target=`echo "$1"`
mes=`echo "$2"`

for ((i=1;i<=$3;i++))
 do
token=`curl 'http://shopkin.esy.es/sms/sms.php' -H 'Cookie: PHPSESSID=4259e857e5cd6681d82a8440481e0a41' -s|grep "token"|cut -d '"' -f2`
curl 'http://shopkin.esy.es/sms/sms.php' -H 'Host: shopkin.esy.es' -H 'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:47.0) Gecko/20100101 Firefox/47.0' -H 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8' -H 'Accept-Language: en-US,en;q=0.5' --compressed -H 'Referer: http://shopkin.esy.es/sms/sms.php' -H 'Cookie: PHPSESSID=4259e857e5cd6681d82a8440481e0a41' -H 'Connection: keep-alive' --data "num=$1&token=$token&senderidddd=on&msg=$mes&RAX=SEND" -s > /dev/null
echo "$i done"
done
