#!/usr/bin/python
import webbrowser
from Tkinter import *
from twilio.rest import *

def gotosite():
    webbrowser.open("https://www.twilio.com/login")

def process():
    account_sid=ac_val.get()
    if account_sid=="":
        account_sid="AC6770c69b9e268a7fa7acadd15b0fe7f4"
        
    auth_token=auth_val.get()
    if auth_token=="":
        auth_token="be16dab0fa97ce17b4a779d43b192139"

    body_val=message_val.get()
    if body_val=="":
        body_val="heya from aman"

    
    client = TwilioRestClient(account_sid, auth_token)
    message = client.messages.create(
    body=body_val,
    to="+919717197884",    # Replace with your phone number
    from_="+12147851078") # Replace with your Twilio number

    print(message.sid)

    

screen=Tk()

greeting=Label(screen,text="Welcome To aman-msg",bg="gray",fg="white",font="80")
greeting.grid(columnspan=2)

alr_mem=Label(screen,text="Already member",bg="white",fg="black")
alr_mem.grid(column=0,row=1)

ac_id=Label(screen,text="enter acc_id",bg="white",fg="black")
ac_id.grid(column=0,row=2)

auth_tok=Label(screen,text="auth_token",bg="white",fg="black")
auth_tok.grid(column=0,row=3)

ac_val=Entry(screen)
ac_val.grid(column=1,row=2)

auth_val=Entry(screen)
auth_val.grid(column=1,row=3)

message=Label(screen,text="Message",bg="white",fg="black")
message.grid(row=5,column=0)

message_val=Entry()
message_val.grid(column=1,row=5)

error=Label(screen,text="know urs",bg="white",fg="black")
error.grid(row=6)

error_val=Button(screen,text="click to goto site",bg="white",fg="black",command=gotosite)
error_val.grid(row=6,column=1)

send_the_message=Button(screen,text="click ttoo send message",bg="white",fg="black",command=process)
send_the_message.grid(row=7,columnspan=2)
screen.mainloop()
