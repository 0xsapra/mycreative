import numpy as np
from numpy.linalg import inv,det

def pad_extra(d):
	if len(d)%3!=0:
		left=len(d)%3
		d=d+"X"*(left-1)
	return d

def hill_cipher_encrypt(plain,key):
	plain=list(plain)
	plain_num=np.array(map(ord,plain))
	plain_num=plain_num-97
	return key.dot(plain_num)

def hill_cipher_decrypt(encr,key):
	inverse=inv(key)
	return (inverse.dot(encr))%26


key=[]
print """Enter the key in following format\nx y z\na b c\ne f g"""
for i in range(3):
	key.append(map(int,raw_input().strip().split()))
key=np.array(key)

plain_text=pad_extra("".join(raw_input("Enter Plain Text to encrypt\n").strip().split()))

for i in range(0,len(plain_text),3):
	to_encrypt=plain_text[i:i+3]
	cipher=hill_cipher_encrypt(to_encrypt,key)
	print "encrypted data for ",to_encrypt,"is ",cipher
	decrypted=hill_cipher_decrypt(cipher,key)
	print "decrypted data using cypher ",cipher," is ",to_encrypt





# aman is a good
# 17 17 5
# 21 8 21
# 2 2 19