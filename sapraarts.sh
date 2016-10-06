#!/usr/bin/python
import webbrowser
import turtle
def square():
    for x in range(0,4):
        if x==0 or x==2:
            aman.right(40)
            aman.forward(100)
        else:
            aman.right(140)
            aman.forward(100)

def make():
    square()
    aman.right(10)

webbrowser.open("http://www.youtube.com")

aman =turtle.Turtle()
win=turtle.Screen()
win.bgcolor("yellow")

for x in range(0,37):
    make()
win.exitonclick()


