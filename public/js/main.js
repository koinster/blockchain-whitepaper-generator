/*
* LEGEND - Iconic Coming Soon Template
* Build Date: January 2016
* Author: Madeon08
* Copyright (C) 2016 Madeon08
* This is a premium product available exclusively here : http://themeforest.net/user/Madeon08/portfolio
*/

/*  TABLE OF CONTENTS
    ---------------------------
    1. Loading / Opening
    2. Parallax Mouse
    3. Action Buttons
    4. Scroll plugins
    5. Newsletter
    6. PhotoSwipe Gallery Init
*/

/* ------------------------------------- */
/* 1. Loading / Opening ................ */
/* ------------------------------------- */

$(window).load(function(){
    "use strict";

    setTimeout(function(){
        $('#preloader').velocity({

            opacity: "0",

            complete: function(){
                $("#loading").velocity("transition.shrinkOut", {
                    duration: 1000,
                    easing: [0.7,0,0.3,1],
                }); 
            }
        });

    },1000);

    setTimeout(function(){
        $('#home-wrap').velocity("transition.fadeIn", {

            opacity : "1",

            complete: function(){

            setTimeout(function() {
                $('.text-intro').each(function(i) {
                    (function(self) {
                        setTimeout(function() {
                            $(self).addClass('animated-middle fadeInUp').removeClass('opacity-0');
                        },(i*150)+150);
                        })(this);
                    });
                }, 1200);
            }

        },

        {
            duration: 1000,
            easing: [0.7,0,0.3,1],
        });
        
    },0);

});

$(document).ready(function(){
    "use strict";

    /* ------------------------------------- */
    /* 2. Parallax Mouse ................... */
    /* ------------------------------------- */

    // var mouseX, mouseY;
    // var traX, traY;

    // $(document).mousemove(function(e){
    //     mouseX = e.pageX;
    //     mouseY = e.pageY;

    //     traX = (e.pageX * -1 / 20);
    //     traY = (e.pageY * -1 / 20);

    //     console.log(traX);

    //     $(".overlay").css({
    //         '-webkit-transform': 'translate3d(' + traX + 'px,' + traY + 'px, 0) scale(1)',
    //         '-moz-transform': 'translate3d(' + traX + 'px,' + traY + 'px, 0) scale(1)',
    //         '-ms-transform': 'translate3d(' + traX + 'px,' + traY + 'px, 0) scale(1)',
    //         '-o-transform': 'translate3d(' + traX + 'px,' + traY + 'px, 0) scale(1)',
    //         'transform': 'translate3d(' + traX + 'px,' + traY + 'px, 0) scale(1)'
    //     });
    // });

    /* ------------------------------------- */
    /* 3. Action Buttons ................... */
    /* ------------------------------------- */

    // Actions when user clicks on More Informations
    $('#open-more-info').on( "click", function() {

                $("#info-wrap").toggleClass("show-info");
                $("#home-wrap").toggleClass("hide-left");
           $(".global-overlay").toggleClass("hide-overlay");
             $("#first-inside").toggleClass("hide-top");
            $("#second-inside").toggleClass("hide-bottom");
                $("#back-side").toggleClass("show-side");
             $(".hide-content").toggleClass("open-hide");
          $("#close-more-info").toggleClass("hide-close");
        $('.command-info-wrap').toggleClass('show-command');
         $('.mCSB_scrollTools').toggleClass('mCSB_scrollTools-left');

        setTimeout(function() {
            $("#mcs_container").mCustomScrollbar("scrollTo", "#info-wrap",{
                scrollInertia:500,
                callbacks:false
            });
        }, 350);
    });

    // Actions when user clicks on the closing button
    $('.to-close').on( "click", function() {

                $("#info-wrap").removeClass("show-info");
                $("#home-wrap").removeClass("hide-left");
           $(".global-overlay").removeClass("hide-overlay");
             $("#first-inside").toggleClass("hide-top");
            $("#second-inside").toggleClass("hide-bottom");
                $("#back-side").toggleClass("show-side");
             $(".hide-content").toggleClass("open-hide");
          $("#close-more-info").toggleClass("hide-close");
        $('.command-info-wrap').toggleClass('show-command');
         $('.mCSB_scrollTools').toggleClass('mCSB_scrollTools-left');

        setTimeout(function() {
            $("#mcs_container").mCustomScrollbar("scrollTo", "#info-wrap",{
                scrollInertia:500,
                callbacks:false
            });
        }, 350);
    });

    // Youtube Variant

    $('.expand-player').on( "click", function() {

        $('#home-wrap').velocity({

                opacity : "0",

            },

            {
                duration: 0,
                easing: [0.7,0,0.3,1],
                delay: 0,

                complete: function(){

                    $('.global-overlay').velocity({
                        opacity : "0",
                    },

                    {
                        duration: 0,
                        easing: [0.7,0,0.3,1],
                        delay: 0,
                    });
                }
        });
    });

    $('.compress-player').on( "click", function() {

        $('#home-wrap').velocity({

            opacity : "1",

        },

        {
            duration: 0,
            easing: [0.7,0,0.3,1],
            delay: 0,

            complete: function(){

                    $('.global-overlay').velocity({
                        opacity : "1",
                    },

                    {
                        duration: 0,
                        easing: [0.7,0,0.3,1],
                        delay: 0,
                    });
                }

        });
    });

    /* ------------------------------------- */
    /* 4. Scroll plugins ................... */
    /* ------------------------------------- */

    $(function() {
        $('body').bind('mousewheel', function(event) {
          event.preventDefault();
          var scrollTop = this.scrollTop;
          this.scrollTop = (scrollTop + ((event.deltaY * event.deltaFactor) * -1));
          //console.log(event.deltaY, event.deltaFactor, event.originalEvent.deltaMode, event.originalEvent.wheelDelta);
        });
    });

    var ifTouchDevices = navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry|Windows Phone)/);

    // ScrollBar on Desktop, not on Touch devices for a perfect ergonomy
    function scrollbar(){

        if (ifTouchDevices){
            $('body').addClass('scroll-touch');

            $('a#open-more-info').on( "click", function() {
                event.preventDefault();
                var target = "#" + this.getAttribute('data-target');
                $('body').animate({
                    scrollTop: $(target).offset().top
                }, 500);
            });
        } 

        else {
            $('body').mCustomScrollbar({
                scrollInertia: 150,
                axis            :"y",

                callbacks:{
                    whileScrolling:function(){
                        var pos=this.mcs.top;
                        if(pos<=-200){
                            $('.to-scroll').addClass('hide-scroll');
                        }else{
                            $('.to-scroll').removeClass('hide-scroll');
                        }
                    }
                }
        
            });  
        }
    }
  
    scrollbar();

    // Tooltips
    if (window.matchMedia("(min-width: 1025px)").matches) { 
            
        $(function () { $("[data-toggle='tooltip']").tooltip(); });

    }


    /* ------------------------------------- */
    /* 6. PhotoSwipe Gallery Init .......... */
    /* ------------------------------------- */

    var initPhotoSwipeFromDOM = function(gallerySelector) {

    // parse slide data (url, title, size ...) from DOM elements 
    // (children of gallerySelector)
    var parseThumbnailElements = function(el) {
        var thumbElements = el.childNodes,
            numNodes = thumbElements.length,
            items = [],
            figureEl,
            linkEl,
            size,
            item;

        for(var i = 0; i < numNodes; i++) {

            figureEl = thumbElements[i]; // <figure> element

            // include only element nodes 
            if(figureEl.nodeType !== 1) {
                continue;
            }

            linkEl = figureEl.children[0]; // <a> element

            size = linkEl.getAttribute('data-size').split('x');

            // create slide object
            item = {
                src: linkEl.getAttribute('href'),
                w: parseInt(size[0], 10),
                h: parseInt(size[1], 10)
            };



            if(figureEl.children.length > 1) {
                // <figcaption> content
                item.title = figureEl.children[1].innerHTML; 
            }

            if(linkEl.children.length > 0) {
                // <img> thumbnail element, retrieving thumbnail url
                item.msrc = linkEl.children[0].getAttribute('src');
            } 

            item.el = figureEl; // save link to element for getThumbBoundsFn
            items.push(item);
        }

        return items;
    };

    // find nearest parent element
    var closest = function closest(el, fn) {
        return el && ( fn(el) ? el : closest(el.parentNode, fn) );
    };

    // triggers when user clicks on thumbnail
    var onThumbnailsClick = function(e) {
        e = e || window.event;
        e.preventDefault ? e.preventDefault() : e.returnValue = false;

        var eTarget = e.target || e.srcElement;

        // find root element of slide
        var clickedListItem = closest(eTarget, function(el) {
            return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
        });

        if(!clickedListItem) {
            return;
        }

        // find index of clicked item by looping through all child nodes
        // alternatively, you may define index via data- attribute
        var clickedGallery = clickedListItem.parentNode,
            childNodes = clickedListItem.parentNode.childNodes,
            numChildNodes = childNodes.length,
            nodeIndex = 0,
            index;

        for (var i = 0; i < numChildNodes; i++) {
            if(childNodes[i].nodeType !== 1) { 
                continue; 
            }

            if(childNodes[i] === clickedListItem) {
                index = nodeIndex;
                break;
            }
            nodeIndex++;
        }



        if(index >= 0) {
            // open PhotoSwipe if valid index found
            openPhotoSwipe( index, clickedGallery );
        }
        return false;
    };

    // parse picture index and gallery index from URL (#&pid=1&gid=2)
    var photoswipeParseHash = function() {
        var hash = window.location.hash.substring(1),
        params = {};

        if(hash.length < 5) {
            return params;
        }

        var vars = hash.split('&');
        for (var i = 0; i < vars.length; i++) {
            if(!vars[i]) {
                continue;
            }
            var pair = vars[i].split('=');  
            if(pair.length < 2) {
                continue;
            }           
            params[pair[0]] = pair[1];
        }

        if(params.gid) {
            params.gid = parseInt(params.gid, 10);
        }

        return params;
    };

    var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
        var pswpElement = document.querySelectorAll('.pswp')[0],
            gallery,
            options,
            items;

        items = parseThumbnailElements(galleryElement);

        // define options (if needed)
        options = {

            // define gallery index (for URL)
            galleryUID: galleryElement.getAttribute('data-pswp-uid'),

            getThumbBoundsFn: function(index) {
                // See Options -> getThumbBoundsFn section of documentation for more info
                var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
                    pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                    rect = thumbnail.getBoundingClientRect(); 

                return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
            }

        };

        // PhotoSwipe opened from URL
        if(fromURL) {
            if(options.galleryPIDs) {
                // parse real index when custom PIDs are used 
                // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
                for(var j = 0; j < items.length; j++) {
                    if(items[j].pid === index) {
                        options.index = j;
                        break;
                    }
                }
            } else {
                // in URL indexes start from 1
                options.index = parseInt(index, 10) - 1;
            }
        } else {
            options.index = parseInt(index, 10);
        }

        // exit if index not found
        if( isNaN(options.index) ) {
            return;
        }

        if(disableAnimation) {
            options.showAnimationDuration = 0;
        }

        // Pass data to PhotoSwipe and initialize it
        gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
        gallery.init();
    };

    // loop through all gallery elements and bind events
    var galleryElements = document.querySelectorAll( gallerySelector );

    for(var i = 0, l = galleryElements.length; i < l; i++) {
        galleryElements[i].setAttribute('data-pswp-uid', i+1);
        galleryElements[i].onclick = onThumbnailsClick;
    }

    // Parse URL and open gallery if it contains #&pid=3&gid=1
    var hashData = photoswipeParseHash();
    if(hashData.pid && hashData.gid) {
        openPhotoSwipe( hashData.pid ,  galleryElements[ hashData.gid - 1 ], true, true );
    }
};

// execute above function
initPhotoSwipeFromDOM('.my-gallery');

});