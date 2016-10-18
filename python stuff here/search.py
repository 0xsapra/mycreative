def binary_search(a,n):
    found=False
    start=0
    top=len(a)-1
    while start<=top and not found:
        mid=(start+top)//2
        if a[mid]==n:
            found =True
        elif a[mid]<n:
            start=mid+1
        else:
            top=mid-1
    
    return found


if __name__=="__main__":
    a=[1,2,4,5,7,9]
    number=int(raw_input("enter a number:"))
    print binary_search(a,number)