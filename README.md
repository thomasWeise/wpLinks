WordPress Links Plugin
======================

This project provides short codes for creating pretty links both
inside a given blog as well as to outside pages.


The following short codes are supported:

* [postLink id=postID title=someTitle]content[/postLink]
  - Puts a hyper link to the post or page of the given id.
  
* [pdfLink url=url title=someTitle]content[/pdfLink]
  - Puts a hyper link to the pdf document at the given URL.
  - If used as [pdfLink url=url /] it will put a link "fullText".
  
* [slidesLink url=url title=someTitle]content[/slidesLink]
  - Puts a hyper link to the slides at the URL.
  - If used as [slidesLink url=url /] it will put a link "slides".
  
* [doiLink title=someTitle]doi[/doiLink]
  - Puts a hyper link to the slides at the URL.