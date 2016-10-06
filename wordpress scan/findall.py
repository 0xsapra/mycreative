import re
filer=open('extract.txt')
tex=filer.read()
mainer=re.findall(r'class="tracked".+>(\w.*)</a>',tex)
print mainer