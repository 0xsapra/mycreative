import threading
import socket

my_soc=socket.socket(socket.AF_INET,socket.SOCK_STREAM)

my_soc.bind(("0.0.0.0",10000))
my_soc.listen(10)


def make_connect():
	(client,(ip,port))=my_soc.accept()
	while 1:
	     cd=client.recv(2048)    
	     client.send(cd)
    
for i in range(10):
	t=threading.Thread(target=make_connect)
	t.start()
