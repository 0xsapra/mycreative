#include<stdio.h>
#include<math.h>

float facto(float x){
    if (x==1){return x;}
    else return x*facto(x-1);
}
float factor(float x,float y){
    float u=x;
    for(float i=1;i<y;i++){u*=x-1;x=x-1;}
    return u;
}

float fact(float total,float end,float strt){
    if(total==strt)return 1;
    else return factor(total,(total-strt))/facto(end);
}



float calca(float effective,float from ,float to,float total){
float defective=1-effective;
float x=0;
for(float i=from;i<=to;i++){
x+=(pow(effective,i)*pow(defective,(total-i)))*(fact(total,i,total-i));
}

return x;
}




int main(){

    float val=calca(0.5,7,16,16);
//    if question says atleast 7 heads thn the arguments passed are like 1st args i.e 0.5 if probability of favour tht is head 2nd is 7 that is atleast 7 and 3rd argument is wht atmost value it can take tht is 16 heads at max, and last 4th arg 16 is total many time an event occur
    
//    if suppose question says exactly 3 times in 100 toses thn we pass calc(0.5,3,3,100)
    printf("%f",val);

return 0;
}
