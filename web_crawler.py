#HOMEWOEK 5 

import os
from bs4 import BeautifulSoup
import urllib.request
import requests
import validators
import urllib

#function to extract links from url
def extract_links(link):
    try:
        
        resp = urllib.request.urlopen(link)
        soup = BeautifulSoup(resp,  from_encoding=resp.info().get_param('charset'))
        b = []
        for x in soup.find_all('a', href=True):
            b.append(x['href'])
        c1 = []
        for i in range(0,len(b)):
            if validators.url(b[i])== True:
                c1.append(b[i])
        return(c1)
        
    except:
        print("No")
    
#function to download pages from the list of urls
def download_links_from_list(list_of_links):
    i=0
    for link in list_of_links:
        name = "filename"+str(i)+".html"
        urllib.request.urlretrieve(link,name)
        i = i+1
#fucntion to crawl as per the depth 
def extract_all_links(orig,depth):
    main = [orig]
    print(main)
    visited = []
    final = []
    
    for n in range(0,depth):
        while main:
            x = main.pop(0)
            xx = [x]
            print(x)
            if x not in visited:
                sub = extract_links(x)
                visited.extend(xx)
                
        main.extend(sub)
        final.extend(sub)
        sub = []
        n=n+1
    return(final)

#program              
original = input("enter the link:")
d = input("enter the depth:")
d = int(d)
all_links = extract_all_links(original,d)
download_links_from_list(all_links)

             
        
   
        
            
        

##page = input("enter the start webpage:")
##levels = input("enter the number of levels:")
##print("all pages download")
