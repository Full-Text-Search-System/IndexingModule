# IndexingModule  

##Introduction

The IndexingModule provides the REST APIs for others if they want to use our indexing and adding functions. 

The Sphinx indexing results are saved in this module.

There are two REST APIs: 

 1. Search API can be used to search words and phrases in the Sphinx indexing result. In this function, we can set the match mode like match all, match any or match boolean like "key | word". And we also support rank mode like BM25. People can choose the method they want to use.

 2. Add API can be used to add files into an remote database and update the Sphinx indexing result in time. In fact, we use RT index and delta-main index to achieve the real-time indexing function. First, we just update the RT index when we add new files. But we set a threshold of RT index, when the number of new files are more than the threshold, we will update the delta index for the new files and merge into main index. And then, the previous RT index will be truncated and rebuild a new one. This can improve the efficency of updating indices and reduce the capacity of RT index.

PS: When you install vagrant by using our VagrantFile, you need to put the file "workspace/demo" into the shared file of virtual machine and local machine. 

##Deployment Steps
We use Vagrant to deploy the development environment.

###Download and install vagrant
Vagrant download link: https://www.vagrantup.com/downloads.html

###Init a Ubuntu 14.04 virtual machine:
```
$ vagrant init  ubuntu/trusty64
```
```
$ vagrant up
```
then, ssh to the virtual machine:
```
$ vagrant ssh
```


In Ubuntu 14.04, we should implement apache2, php, mysql, Sphinxsearch and Laravel:

###Install apache2:  
```
$ apt-get update
```  
```
$ apt-get install -y apache2
```

###Update php package to php5.6:  
```
$ sudo apt-get install python-software-properties
```   
```
$ sudo apt-add-repository ppa:ondrej/php5-5.6
```   

###Install php5.6:  
```
$ sudo apt-get update
```   
```
$ sudo apt-get install php5 php5-mcrypt
```

###Install mysql  
```
$ sudo apt-get install -y mysql-server mysql-client
```   
```
$ sudo apt-get install libapache2-mod-auth-mysql
```  
```
$ sudo apt-get install php5-mysql
```  


In order to install Laravel, we need composer:  
###Install composer  
```
$ sudo php -r "readfile('https://getcomposer.org installer')" | sudo php -- --filename=composer
```  
```
$ sudo mv composer /usr/local/bin/composer
```

###Install Laravel:  
```
$ composer global require "laravel/installer=~1.1"
```

###Set Laravel to PATH:  
````
$ cd /etc
````  
````
$ sudo nano profile
````  
And add this line into this file:
````
export PATH="$PATH:/home/vagrant/.composer/vendor/bin"
````  
Now, we can use Laravel in command line.

###Install Sphinxsearch:  
````
$ sudo add-apt-repository ppa:builds/sphinxsearch-rel22
````  
````
$ sudo apt-get update
````  
````
$ sudo apt-get install sphinxsearch
````  

###Run Sphinxsearch:  
```
$ sudo service sphinxsearch start
```

###Install pip:
```
$ apt-get install python-pip
```
###Grant permission to php: 
```
$ sudo visudo
```  

then, add the code at the last line:

```
www-data ALL=NOPASSWD: /usr/bin/indexer
```
###Install required python modules

install mysql module:  

```
$ sudo apt-get install python-mysqldb
```  

install loxun module:  

```
$ pip install loxun
```
##Run the module
