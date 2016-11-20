import crypt

def Main():
    pass_file=open("pass.txt",'r')
    for line in pass_file.readlines():
        user=line.split(':')[0]
        pas=line.split(':')[1].strip(' ')       
        crac(pas)

def crac(pasw):
    dictionary=open("dict.txt",'r')
    for line in dictionary.readlines():
        name=line.strip('\n')
        encrypt=crypt.crypt(name,pasw[0:2])
	print name+ encrypt
        if encrypt==pasw:
            print "found password "+line
            break
   

Main()
