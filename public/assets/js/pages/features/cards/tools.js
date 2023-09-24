"use strict";

var KTCardTools = function () {
    // Toastr
    var initToastr = function() {
        toastr.options.showDuration = 1000;
    }

    // Demo 1
    var demo1 = function() {
        var card = new KTCard('kt_card_1');

        // Toggle event handlers
      

        card.on('afterCollapse', function(card) {
          
        });

        card.on('beforeExpand', function(card) {
           
        });

        card.on('afterExpand', function(card) {
         
        });

        

        // Reload event handlers
        card.on('reload', function(card) {
            toastr.info('Leload event fired!');

            KTApp.block(card.getSelf(), {
                overlayColor: '#ffffff',
                type: 'loader',
                state: 'primary',
                opacity: 0.3,
                size: 'lg'
            });

            // update the content here

            setTimeout(function() {
                KTApp.unblock(card.getSelf());
            }, 2000);
        });
    }

    


    return {
        //main function to initiate the module
        init: function () {
            initToastr();
            demo1();
          
        }
    };
}();

jQuery(document).ready(function() {
    KTCardTools.init();
});
