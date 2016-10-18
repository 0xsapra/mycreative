def jump_count(a):
    
    
    left=a-1
    i=1
    while True:
        left=left-(2*i)
        print left,"and i is",i

        if left<=0:
            return i*2 if left>-i else  (i*2)-1
        i+=1

s=int(raw_input())
print jump_count(s)
    
