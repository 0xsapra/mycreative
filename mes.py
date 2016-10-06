#!/usr/bin/Python
from twilio.rest import TwilioRestClient

account_sid = "AC6770c69b9e268a7fa7acadd15b0fe7f4" # Your Account SID from www.twilio.com/console
auth_token  = "be16dab0fa97ce17b4a779d43b192139"  # Your Auth Token from www.twilio.com/console

client = TwilioRestClient(account_sid, auth_token)

message = client.messages.create(body="Hello from Python",
    to="+919717197884",    # Replace with your phone number
    from_="+12147851078") # Replace with your Twilio number

print(message.sid)
