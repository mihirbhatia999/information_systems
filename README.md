# GitHub Guide 

This is a guidebook for anyone looking to get started with GitHub. It includes both the use of Git commands (Git Bash) and GitHub desktop for someone not looking to delve into scripting. 

## Topics
1. [What is Git ?](#what-is-git)
2. [What's a repo](#what-is-a-repo)
3. [Basic Git Commands](#basic-git-commands)
4. [Methods to use GitHub](#methods-to-use-git)
5. [Steps to use Github Desktop](#steps-to-use-github-desktop)
6. [Basics of GitBash](#basics-of-gitbash)
7. [Branches](#branches)

## What is Git
Git is a system that allows an individual or team to keep track of changes that they make their files on common platform. It prevents the need for multiple versions of the files. It's extremely useful for collaborative projects. 

## What is a repo
A repository is just a storage location for files and folders. A repository can be local or remote. The local repository is located on your PC whereas the remote repository is on the cloud (in our case our remote repo is GitHub). 

## Basic Git Commands 
### git clone 
```git clone``` command lets us copy the entire repository into a file of our choice. 
### git pull 
```git pull``` command lets us pull changes or updates into an already existing local repo from the remote repo on GitHub.com 
### git add  
```git add``` is responsible for snapshotting the file in preparation of versioning 
### git status 
```git status``` gives a list of all the files that are ready to be committed 
### git commit 
```git commit``` command lets you commit this code within your local repo along with a message about the changes. It gets the code ready to be pushed into the remote repo and accessible to the team. 
### git push 
```git push``` is the final command that pushes the code with changes to your remote repo (in our case it is GitHub.com) 

## How do all these commands work together ? 
In a case where the local repo doesn't exist, you would have to clone the repo into your PC using the ```git clone``` command. If you've already setup a local repo, you can pull the updates that may have been made by other team members and pushed onto GitHub, into your own local repository to make those changes visible. 

We can access files from our local repositories and make changes to them/add new files. These updates can then be staged as ready to be committed. We then commit the staged files with a message that states the changes made/files added along with additional information that you might need to refer to in case you wanted to go back to a previous version of your code. 

Now, these commited files are ready to be pushed to the remote repository. From where they can again be cloned/pulled. 

#### NOTE: 
You can also go to GitHub.com or GitHub Desktop and access the changes made by the different contributors (the members who have permission to push changes into the repo) of the repositories.  

## Methods to use Git 
As someone who needs to get started with GitHub, you can use the Desktop version of GitHub.

## Steps to use GitHub Desktop 
### Download and Install 
[Download GitHub Desktop Here](https://desktop.github.com/)

![Github Desktop](https://github.com/mihirbhatia999/information_systems/blob/master/GitHubPresentation/Capture1.PNG)

### Sign in to Github 
Use an existing github account to login. Make sure that you have access (i.e. you are a contributor) to the repo that you plan to work on. You will not be able to view private repos without permissions. 
To Sign in : **Select File > Options > Sign in (GitHub)**
![Github Desktop](https://github.com/mihirbhatia999/information_systems/blob/master/GitHubPresentation/Capture2.PNG)
### Select the repo
Select the repo that you need to work on 
![Github Desktop](https://github.com/mihirbhatia999/information_systems/blob/master/GitHubPresentation/Capture3.PNG)
### Clone the repo 
Use either **Ctrl + Shift + O** or **File>Clone a repository** to open up window where you can enter the path of your local repo. 
![Github Desktop](https://github.com/mihirbhatia999/information_systems/blob/master/GitHubPresentation/Capture4.PNG)
### Make an update 
Go to the path where your local repo is stored and make the changes/updates to the code. Once you're done, get back to Github and you should see that your changes have been detected. 

### Commit the changes 
Commit your changes in the local repo with an appropriate description message 
![Github Desktop](https://github.com/mihirbhatia999/information_systems/blob/master/GitHubPresentation/Capture5.PNG)
### Push code 
Push the updates to GitHub.com. Check on github to see if updates are present. If there is a conflict, take a look at it and resolve it.
**Repository > Push**
### Pull code 
Once you have a local repo setup, you only need to pull updates of your files into the same local repo and don't need to clone the repo. 
**Repository > Pull**
![Github Desktop](https://github.com/mihirbhatia999/information_systems/blob/master/GitHubPresentation/Capture6.PNG)

## Some great references 
1. [How to use Github - Siraj Raval](https://www.youtube.com/watch?v=Loav1kbA640)
2. [Learn to Git - Basic Concepts](https://www.youtube.com/watch?v=8KCQe9Pm1kg)
3. [Git Bash File Commands](https://www.youtube.com/watch?v=bqV-eszlRhY)
4. [Github Cheatsheet](https://education.github.com/git-cheat-sheet-education.pdf)
5. [Git Documentation](https://git-scm.com/docs)

## Author 
Mihir Bhatia  - [Visit my Website](https://www.mihirbhatia.com)
