import requests
import codecs
from bs4 import BeautifulSoup

# url.txt
with open('url.txt', 'r') as file:
    data = file.read().replace('\n', '')
data=data.strip()
url = data
# url='https://tech.economictimes.indiatimes.com/news/internet/google-in-talks-with-publishers-to-pay-for-premium-content-sources/74144364'
print("url : ",url)
res = requests.get(url)
html_page = res.content
soup = BeautifulSoup(html_page, 'html.parser')
text = soup.find_all(text=True)

output = ""
blacklist = [
	'[document]',
	'noscript',
	'header',
	'html',
	'meta',
	'head', 
	'input',
	'script',
	'title',
	'meta',
	'link',
	'img',
	'audio',
	'video',
	'a',
	'div',
	'iframes',
	'style',
	# there may be more elements you don't want, such as "style", etc.
]

for t in text:
	if t.parent.name not in blacklist:
		output += '{} '.format(t)
# output = output.encode()
output=output.strip()
# print("type : ",type(output),"  ,,,")
# output=bytes(output)
# output.replace("\n"," ")
# if type(output) == str:
#     # Ignore errors even if the string is not proper UTF-8 or has
#     # broken marker bytes.
#     # Python built-in function unicode() can do this.
#     output = unicode(value, "utf-8", errors="ignore")
# else:
#     # Assume the value object has proper __unicode__() method
#     output = unicode(output)

file = codecs.open("webscrapout.txt", "w+", "utf-8")
file.write(output)
subprocess.run(["chmod 777 webscrapout.txt"],shell=True)
# print(output)
