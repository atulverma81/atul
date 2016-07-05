/*
 * 50 jQuery Function Demos for Aspiring Web Developers
 * Copyright 2012 Sam Deering for Smashing Magazine
 * http://coding.smashingmagazine.com/2012/05/31/50-jquery-function-demos-for-aspiring-web-developers/
 * http://bit.ly/KXrI9u
 */
(function($,W,D)
{
    var JQFUNCS =
    {
        name : 'JQFUNCS',

        init: function()
        {
            _this = this;

             

            /* setup demos event handlers */
            $('#j4u-post .demobtn').live('click', function(e)
            {
                e.preventDefault();
                var thisId =$(this).attr('id');
                thisId = thisId.substring(0,thisId.lastIndexOf('-'));
                $('div#'+thisId).show(); /* show demo box */
                $('#'+thisId+'-resetbtn').show(); /* show reset button */

                /* Run demo - Doesn't look like it's possible to grab the namespace function name dynamically using arguments.callee.toString() or Function.caller or such! so... I only option I could see was to pass the id instead of declaring it statically. */
                eval('JQFUNCS.runFunc["'+thisId+'"]["run"]("'+thisId+'")');
            });

           
           
        },

        runFunc:
        {
            /* ------------------------------ Animation Functions ------------------------------ */
            

            "fadeToggle":
            {
                run: function(id)
                {   
                    $('#'+id+' .readmore').fadeToggle('slow');
                },

                reset: function(id)
                {}
            },
             "fadeToggle1":
            {
                run: function(id)
                {    
                    $('#'+id+' .readmore').fadeToggle('slow');
                },

                reset: function(id)
                {}
            },
            "fadeToggle2":
            {
                run: function(id)
                {   
                    $('#'+id+' .readmore').fadeToggle('slow');
                },

                reset: function(id)
                {}
            },
            "fadeToggle3":
            {
                run: function(id)
                {   
                    $('#'+id+' .readmore').fadeToggle('slow');
                },

                reset: function(id)
                {}
            },
            "fadeToggle4":
            {
                run: function(id)
                {   
                    $('#'+id+' .readmore').fadeToggle('slow');
                },

                reset: function(id)
                {}
            },
            "fadeToggle5":
            {
                run: function(id)
                {   
                    $('#'+id+' .readmore').fadeToggle('slow');
                },

                reset: function(id)
                {}
            },
            "fadeToggle6":
            {
                run: function(id)
                {   
                    $('#'+id+' .readmore').fadeToggle('slow');
                },

                reset: function(id)
                {}
            },
            "fadeToggle7":
            {
                run: function(id)
                {   
                    $('#'+id+' .readmore').fadeToggle('slow');
                },

                reset: function(id)
                {}
            },
            "fadeToggle8":
            {
                run: function(id)
                {   
                    $('#'+id+' .readmore').fadeToggle('slow');
                },

                reset: function(id)
                {}
            },
            "fadeToggle9":
            {
                run: function(id)
                {   
                    $('#'+id+' .readmore').fadeToggle('slow');
                },

                reset: function(id)
                {}
            }
            

           
           
        }

        
    }

    $(document).ready(function() {
        JQFUNCS.init();
    });

})(jQuery,window,document);