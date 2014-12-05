#LiveVibe


####LiveVibe will be implemented with PHP, utilizing MAMP and Twitter Bootstrap framework.  

> LiveVibe is a mock online community for fans of live music. Our goal is to build an online service that offer information about bands and concerts. Fans can follow their favorite bands and head to upcoming concerts. Our service also incorporate a simple recommendation system and search mechanisms.  

#### Minimum Requirement:  

+ LiveVibe should store information about `Bands(Artists)`, `Concerts`, `Venues`, it will be able to ***inform the relevant upcoming concerts***  
  
+ `Users` should be able to
   - ***sign up*** and ***specify music tastes*** and ***which band they like*** (***follow*** as Fans)
 	- ***follow other users***  
 	- ***make lists of recommended upcoming concerts*** if they are experts for certain type of music
 	- ***specify they plan to go*** and ***give rating*** or ***write reviews*** afterwards
 	- ***post additional content*** to help others(Comment)
 	- ***post other concerts*** that missing from the system if their **reputation** is high enough
 	
+ Plus, a simple **recommendation** system even the user is not yet a fan of the band or type of music(guess what you like, maybe using tag?) and **search** mechanisms(database should support text operators such as "like" and "contains")  

#### Some details:  

+ `Users` select a unique user name, provide some basic information.(http://livevibe/jake)
+ `Users` has a personal page show his info and ***got notification*** about upcoming concert recommended by users(experts) she follows + system recommendation via `message feed`
+ `Artists` can sign up and post their info and activities:
	- **[Artists need to be verified by LiveVibe]**  
 	- Well known artists can authorize LiveVibe to post their info and concerts
 	- Less known artists post by themselves
+ `Venues` already created in system
+ **Hierarchical categories** for music genre  
+ **Reputation** is based on users past reviews and ratings, the recommendations they created, past data about concert they posted(score 8 or higher can post)  
+ **Search** based on `keywords`, `categories`, `locations` or `time`, search result should derived from URL  

####Tricks:

+ **Add TimeStamp** to indicate kinds of posts, when user logged in, when user last accessed the system. This will allow the application display new content of interest has become available since the last time the user logged in.  
+ **Different Views for different Groups**:  `admin` can see all the content, `user` stays in application layer and only see and does within his own rights.  

