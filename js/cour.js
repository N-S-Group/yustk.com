(function($) {
    // значение по умолчанию
    var defaults = {
        width : 0,
        height : 0
    };



    // актуальные настройки, глобальные
    var options;

    var plgCour = {

        status: {
            goNext : false,
            goBack : false
        },

        timer: null,
        imgs: Array(),

        currentFrame: 0,

        init: function (my_this){

            jQuery.each($(my_this).find("img.imgCour"),function(k, v) {
                plgCour.imgs.push($(v));
            });

            plgCour.currentFrame = 0;
            $("#left-cour").click(function(){
                plgCour.prevStep();
            });
            $("#right-cour").click(function(){
                plgCour.nextStep();
            });




            plgCour.setTimer();
        },

        setTimer: function() {
            plgCour.timer = $.timer(4500, function() {
                plgCour.nextStep();
            });

        },

        nextStep: function() {
            curr = plgCour.currentFrame;
            if (plgCour.currentFrame+1 >= plgCour.imgs.length) next = 0; else next = plgCour.currentFrame + 1;
            plgCour.step(curr, next);
        },

        prevStep: function() {
            curr = plgCour.currentFrame-1;
            if (plgCour.currentFrame-1 <= 0) next = plgCour.imgs.length-1; else next = plgCour.currentFrame - 1;
            plgCour.step(curr+1, next);
        },


        step: function (curr, next){




          //

            plgCour.imgs[curr].css({"position":"absolute", "top":0});
            plgCour.imgs[next].css({"position":"absolute", "top":0});
            plgCour.imgs[curr].fadeOut(1000, function(){

            });

            plgCour.imgs[next].fadeIn(1000);


            plgCour.currentFrame = next;


        }
    }

    $.fn.Cour = function(params){
        // настройки
        options = $.extend({}, defaults, options, params);

        plgCour.init(this);

        return this;
    };
})(jQuery);
