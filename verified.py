import numpy as np
import cv2 as cv


def scale(image, scale_width):
    (image_height, image_width) = image.shape[::2]
    new_height = int(scale_width / image_width * image_height)
    return cv.resize(image, (scale_width, new_height))


watermark = scale(cv.imread(
    r'C:\xampp\htdocs\documentVerifier\assets\images\logo.jpg', cv.IMREAD_UNCHANGED), 400)
(wh, ww) = watermark.shape[:2]

image = scale(
    cv.imread(r'C:\xampp\htdocs\documentVerifier\assets\images\006.jpg'), 1200)
(image_height, image_width) = image.shape[:2]
image = cv.cvtColor(image, cv.COLOR_BGR2BGRA)

overlay = np.zeros((image_height, image_width, 4),
                   dtype='uint8')
overlay[image_height-wh:image_height, image_width-ww:image_width] = watermark

output1 = image.copy()
output2 = image.copy()
output3 = image.copy()

cv.addWeighted(overlay, 0.1, image, 1.0, 0, output1)
cv.addWeighted(overlay, 0.5, image, 1.0, 0, output2)
cv.addWeighted(overlay, 1.0, image, 1.0, 0, output3)


while True:
    cv.imshow("overlay", output1)
    cv.imshow("Image", output2)
    cv.imshow('Watermark', output3)
    if cv.waitKey(1) == ord('q'):
        break
