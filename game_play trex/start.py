import pyautogui
import numpy as np
import cv2
from PIL import ImageGrab


def jump():
	pyautogui.keyUp(' ')
	pyautogui.keyDown(' ')

def draw_lines(img,lines):

	line=lines[0]
	for i in line:
		x1=i[0]
		y1=i[1]
		x2=i[2]
		y2=i[3]
		if y1==y2:
			continue
		cv2.line(img,(x1,y1),(x2,y2),(0,255,0),3)
		if abs(x2-x1)<5 and (x1>180 and x1<200):
			jump()
			print "jumped"
	return img

def process_img(orignal_img):
	gray_img=cv2.cvtColor(orignal_img,cv2.COLOR_BGR2GRAY)
	ret, mask=cv2.threshold(gray_img, 100, 255, cv2.THRESH_BINARY)
	masked=cv2.bitwise_and(gray_img,gray_img,mask=mask)
	edges=cv2.Canny(masked,10,20)
	lines = cv2.HoughLinesP(edges,1,np.pi/180,threshold = 10,minLineLength = 5,maxLineGap = 0)
	new_img=draw_lines(orignal_img,lines)
	return new_img

while(1):
	img=np.array(ImageGrab.grab(bbox=(400,250,900,450)))
	
	screen=process_img(img)
	# screen[130:165,180:190]

	cv2.imshow("screen",screen)

	k=cv2.waitKey(1)
	if k==ord('q'):
		cv2.destroyAllWindows()
		break