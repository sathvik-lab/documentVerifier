#!/usr/bin/env python

import pytesseract

import cv2
# Create the decoder
# decoder = cv2.QRCodeDetector()
# # Load Your Data
# file_name = r'C:\xampp\htdocs\documentVerifier\assets\images\006.jpg'
# qr_img = cv2.imread(file_name)
# # Decode and print the information
# data, data_points, qrcode = decoder.detectAndDecode(qr_img)

# print(data)


pytesseract.pytesseract.tesseract_cmd = r'C:\Program Files\Tesseract-OCR\tesseract'

str = pytesseract.image_to_string(r'C:\Users\test\006.jpg')


# Name of the QR Code Image file
filename = r'C:\xampp\htdocs\documentVerifier\images\006.jpg'
#read
image = cv2.imread(filename)

detector = cv2.QRCodeDetector()
# detect and decode

data, vertices_array, binary_qrcode = detector.detectAndDecode(image)

flag = False
# if there is a QR code
if vertices_array is not None:
    #checking if the data from the qr , matches the text from the image 
    if data in str :
        flag = True

if(flag):
    print("2")

