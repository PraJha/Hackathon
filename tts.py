from gtts import gTTS
from unidecode import unidecode
import os
import sys
def remove_non_ascii(text):
    return unidecode(unicode(text, encoding = "utf-8"))

filename = "/var/www/html/global/themes/global/textfile.txt"
# filepath="/var/www/html/global/themes/global/textfile.txt"

with open(filename, 'w+') as file:
    data = file.read().replace('\n', '')
subprocess.run(["chmod 777 textfile.txt"],shell=True)
data=data.strip()
data=remove_non_ascii(data)
# unicode(data, 'utf8')
print("Type ",type(data))

print(data)

filePath1 = '/var/www/html/global/themes/global/audio.wav';
filePath2 = '/var/www/html/global/themes/global/audio.mp3';
 
# As file at filePath is deleted now, so we should check if file exists or not not before deleting them
# if os.path.exists(filePath1):
#     os.remove(filePath1)
# if os.path.exists(filePath2):
#     os.remove(filePath2)
tts = gTTS(text=data, lang='en')
print("Type ",type(data))
tts.save("$filePath1")
tts.save("$filePath2")
subprocess.run(["chmod 777 $filePath1"],shell=True)
subprocess.run(["chmod 777 $filePath2"],shell=True)
# os.chmod("audio.wav", 0o777)
# os.chmod("audio.mp3", 0o777)
#os.system("mpg321 good.mp3")
