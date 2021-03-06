# IndexingModule  

##Introduction

The IndexingModule provides the REST APIs for others if they want to use our indexing and adding functions. 

The Sphinx indexing results are saved in this module.

There are two REST APIs: 

 1. Search API can be used to search words and phrases in the Sphinx indexing result. In this function, we can set the match mode like match all, match any or match boolean like "key | word". And we also support rank mode like BM25. People can choose the method they want to use.

 2. Add API can be used to add files into an remote database and update the Sphinx indexing result in time. In fact, we use RT index and delta-main index to achieve the real-time indexing function. First, we just update the RT index when we add new files. But we set a threshold of RT index, when the number of new files are more than the threshold, we will update the delta index for the new files and merge into main index. And then, the previous RT index will be truncated and rebuild a new one. This can improve the efficency of updating indices and reduce the capacity of RT index.


##Deployment Steps
We use Vagrant to deploy the development environment.

###Download and install vagrant
Vagrant download link: https://www.vagrantup.com/downloads.html

###Init a Ubuntu 14.04 virtual machine with the required develop envrionment

#####We have upload a vagrant box wiht required development envrionment in https://atlas.hashicorp.com/FTS, please download the version 2.0 one


If you want to modify the virtual machine, you can ssh to the virtual machine:
```
$ vagrant ssh
```

##Run the module

remember to modify the file name to IndexingModule
```
$cd IndexingModule
```
```
$vagrant up
```
