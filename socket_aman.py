import socket
soc=socket.socket(socket.AF_INET,socket.SOCK_STREAM)
soc.bind(("0.0.0.0",9119))
soc.listen(3)
print "waiting for client"
(client,(ip,port))=soc.accept()
print "client recieved with ip"+str(ip)+"and port"+str(port)
x="no"
while x:
    client.send("enter input")
    x=client.recv(2048)
    client.send(x)
    if x==" ":
        break
client.close()
soc.close()
    
    
    
