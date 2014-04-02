/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var app = {

    registerEvents: function() {
        var self = this;
        // Check of browser supports touch events...
        if (document.documentElement.hasOwnProperty('ontouchstart')) {
            // ... if yes: register touch event listener to change the "selected" state of the item
            $('body').on('touchstart', 'a', function(event) {
                $(event.target).addClass('tappable-active');
            });
            $('body').on('touchend', 'a', function(event) {
                $(event.target).removeClass('tappable-active');
            });
        } else {
            // ... if not: register mouse events instead
            $('body').on('mousedown', 'a', function(event) {
                $(event.target).addClass('tappable-active');
            });
            $('body').on('mouseup', 'a', function(event) {
                $(event.target).removeClass('tappable-active');
            });
        }
        $(window).on('hashchange', $.proxy(this.route, this));
    },

    // shows a welcome
    showAlert: function(message, title) {
        // mobile devices use navigator object, otherwise use browser behavior
        if (navigator.notification){
            navigator.notification.alert(message,null,title,'OK');
        }else{
            alert(title ? (title + ": " + message) : message);
        }
    },

    initialize: function() {
        var self = this;
        this.registerEvents();
    }

};

app.initialize();

$('.add-contact-btn').click(function(){
    alert('clicked');
    addToContacts(window.personProfile);
});

    // Wait for PhoneGap to load
    document.addEventListener("deviceready", onDeviceReady, false);

    // PhoneGap is ready
    //
    function onDeviceReady() {
        var element = document.getElementById('deviceProperties');
        element.innerHTML = 'Device Name: '     + device.name     + '<br />' + 
                            'Device PhoneGap: ' + device.phonegap + '<br />' + 
                            'Device Platform: ' + device.platform + '<br />' + 
                            'Device UUID: '     + device.uuid     + '<br />' + 
                            'Device Version: '  + device.version  + '<br />';
    }
