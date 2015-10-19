# IndexingModule

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
###grant permission to php: 
```
$ sudo visudo
```  

then, add the code at the last line:

```
www-data ALL=NOPASSWD: /usr/bin/indexer
```
###install required python modules

install mysql module:  

```
$ sudo apt-get install python-mysqldb
```  

install loxun module:  

```
$ pip install loxun
```
