(function(h){h.fn.rssfeed=function(q,f,r){f=h.extend({limit:10,header:!0,titletag:"h4",date:!0,content:!0,snippet:!0,media:!0,showerror:!0,errormsg:"",key:null,ssl:!1,linktarget:"_self"},f);return this.each(function(s,l){var p=h(l),d="";f.ssl&&(d="s");p.hasClass("rssFeed")||p.addClass("rssFeed");if(null==q)return!1;d="http"+d+"://ajax.googleapis.com/ajax/services/feed/load?v=1.0&callback=?&q="+encodeURIComponent(q);null!=f.limit&&(d+="&num="+f.limit);null!=f.key&&(d+="&key="+f.key);h.getJSON(d+"&output=json_xml",
function(b){if(200==b.responseStatus){var e=b.responseData,b=f,g=e.feed;if(g){var a="",d="odd";if(b.media){var j=e.xmlString;"Microsoft Internet Explorer"==navigator.appName?(e=new ActiveXObject("Microsoft.XMLDOM"),e.async="false",e.loadXML(j)):e=(new DOMParser).parseFromString(j,"text/xml");j=e.getElementsByTagName("item")}b.header&&(a+='<div class="rssHeader"><a href="'+g.link+'" title="'+g.description+'">'+g.title+"</a></div>");a+='<div class="rssBody"><ul>';for(e=0;e<g.entries.length;e++){var c=
g.entries[e],i;c.publishedDate&&(i=new Date(c.publishedDate),i=i.toLocaleDateString()+" "+i.toLocaleTimeString());a+='<li class="rssRow '+d+'"><'+b.titletag+'><a href="'+c.link+'" title="View this feed at '+g.title+'">'+c.title+"</a></"+b.titletag+">";b.date&&i&&(a+="<div>"+i+"</div>");b.content&&(a+="<p>"+(b.snippet&&""!=c.contentSnippet?c.contentSnippet:c.content)+"</p>");if(b.media&&0<j.length){c=j[e].getElementsByTagName("enclosure");if(0<c.length){for(var a=a+'<div class="rssMedia"><div>Media files</div><ul>',
k=0;k<c.length;k++)var m=c[k].getAttribute("url"),n=c[k].getAttribute("type"),o=c[k].getAttribute("length"),m='<li><a href="'+m+'" title="Download this media">'+m.split("/").pop()+"</a> ("+n+", ",n=Math.floor(Math.log(o)/Math.log(1024)),o=(o/Math.pow(1024,Math.floor(n))).toFixed(2)+" "+"bytes,kb,MB,GB,TB,PB".split(",")[n],a=a+(m+o+")</li>");a+="</ul></div>"}a+="</li>"}d="odd"==d?"even":"odd"}h(l).html(a+"</ul></div>");h("a",l).attr("target",b.linktarget)}h.isFunction(r)&&r.call(this,p)}else f.showerror&&
(g=""!=f.errormsg?f.errormsg:b.responseDetails),h(l).html('<div class="rssError"><p>'+g+"</p></div>")})})}})(jQuery);