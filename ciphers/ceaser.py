def crypt_ceaser(encr,key):
	return "".join(map(chr,map(lambda x:((x-97+key)%26)+97,(map(ord,list(encr))))))

def crypt_ceaser_dec(encr,key):
	return "".join(map(chr,map(lambda x:((x-97-key)%26)+97,(map(ord,list(encr))))))

print crypt_ceaser(raw_input("Enter enctypter text\n"),input("enter key\n"))
print crypt_ceaser_dec(raw_input("Enter dectypter text\n"),input("enter key\n"))