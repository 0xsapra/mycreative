def chainNames(n):
    d = { s[0].lower():s for s in n }
    print d
    for w in d:
        l = dict(d)
        c = []
        while w:
            w = l.pop(w[-1],0)
            c += w,
            if not l:
                return c

#    f=[x[0].lower() for x in names]
#    l=[x[-1] for x in names]
#    first=(set(f)-set(l)).pop()
#    res=[]
#    for i in names:
#        first=f.index(first)
#        res.append(names[first])
#        first=l[first]
#    print res

    
if __name__=="__main__":
    names = ["Raymond",  "Nora", "Daniel","Louie", "Peter", "Esteban"]
    print chainNames(names)
    
    