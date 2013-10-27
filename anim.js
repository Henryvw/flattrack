var padValues = function(t1,t2) {
    if (t1.length < t2.length) {
        var diff = t2.length - t1.length;
        for (i = 0; i<diff; i++) {
            t1.push(0);
        }
    } else if (t2.length < t1.length) {
        var diff = t1.length - t2.length;
        for (i = 0; i<diff; i++) {
            t2.push(0);
        }
    }
}

var arrsum = function(tl) {
    var sum = 0;
    tl.forEach( function(v) {
        sum += v;
    })
    return sum;
}

var bamm = function(top) {
    $('#bamm').show();
    $('#bamm').offset({top:top});
    window.setTimeout( function() {
        $('#bamm').hide();
        $('.car').removeClass("bamm");
    }, 400);
}

var switchLanes = function($car1, $car2) {

    var curPos1 = $car1.position().top;
    var curPos2 = $car2.position().top;

    if (Math.abs(curPos1 - curPos2) < 138) {
        bamm((curPos1+curPos2)/2);
        $car1.addClass("bamm");
        $car2.addClass("bamm");
    } else {
        [$car1,$car2].forEach( function ($car) {
            if ($car.hasClass('lane1'))
                $car.removeClass('lane1').addClass("lane2");
            else
                $car.removeClass('lane2').addClass("lane1");
        });
    }

}
var startAnimation = function(timelanes) {
    var i = 0, idx = 0;

    var $car1 = $('#car1');
    var $car2 = $('#car2');

    var t1 = timelanes['car1'];
    var t2 = timelanes['car2'];
    padValues(t1,t2);

    var laneHeight=1136-150;
    var arrsum1 = arrsum(t1), arrsum2 = arrsum(t2);
    var longestRide = Math.max(arrsum1, arrsum2);
    var ratio = laneHeight/longestRide;
    var mLaneTop = -7000;
    var middleLineIntv = window.setInterval( function() {
       $('#middlelane').offset({'top':mLaneTop });
        mLaneTop+=10;
    }, 20);
    var interval = window.setInterval( function() {
        var p1 = t1[idx], p2 = t2[idx];
        var curPos1 = $car1.position().top;
        var curPos2 = $car2.position().top;
        var newPos1 = curPos1-p1*ratio, newPos2 = curPos2-p2*ratio;
        $car1.offset({top:newPos1});
        $car2.offset({top:newPos2});

        if (p1 == p2) {
            switchLanes($car1, $car2);
        }

        idx++;
        if (idx == t1.length) {
            window.clearInterval(interval);
            window.clearInterval(middleLineIntv);
        }
    },500);

}




