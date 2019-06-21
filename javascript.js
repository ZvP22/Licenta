
var trackSize = 0;

var RangeSlider = function(el) {
    this.el = el;
    this.parent  = el.parentNode;
    this.range1 = elementByClassName(this.parent, 'double-range__thumb', 0);
    this.range2 = elementByClassName(this.parent, 'double-range__thumb', 1);
    this.bar = elementByClassName(this.parent, 'double-range__bar', 0);
    this.width = this.range1.offsetWidth;
    this.min = parseFloat(this.range1.min);
    this.max = parseFloat(this.range1.max);
    this.displayElement = elementByClassName(this.parent, 'double-range__value', 0);

    this.update = function() {
        var rangeValue1 = parseFloat(this.range1.value);
        var rangeValue2 = parseFloat(this.range2.value);
      
      console.log(rangeValue1, rangeValue2);

        if (rangeValue1 > rangeValue2) {
            var tmp = rangeValue2;
            rangeValue2 = rangeValue1;
            rangeValue1 = tmp;
        }

        this.displayElement.innerHTML ='Pretul intre '+ rangeValue1 + ' - ' + rangeValue2 + ' Lei';

        this.bar.style.opacity = 1;
        this.bar.style.width = ((((rangeValue2-rangeValue1)*(this.width-trackSize))/this.max)) + 'px';
        this.bar.style.left = ((rangeValue1*(this.width-trackSize)/this.max) + (trackSize/2)) + 'px';

       
    }

};

function toArray(data) {
    return [].slice.call(data);
}

function arrayByClassName(context, selector) {
    return toArray(context.getElementsByClassName(selector));
}

function elementByClassName(context, selector, offset) {
    return arrayByClassName(context, selector)[offset];
}

function isHover(e) {
    return (e.parentElement.querySelector(':hover') === e);
}

function detectIE() {
    var ua = window.navigator.userAgent;
    var version = null;
    var response = false;

    var msie = ua.indexOf('MSIE ');
    if (msie > 0) {
        // IE 10 or older => return version number
        version = parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
        response = true;
    }

    var trident = ua.indexOf('Trident/');
    if (trident > 0) {
        // IE 11 => return version number
        var rv = ua.indexOf('rv:');
        version = parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
        response = true;
    }

    var edge = ua.indexOf('Edge/');
    if (edge > 0) {
        // Edge (IE 12+) => return version number
        version = parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
        response = true;
    }

    // other browser
    return response;
}

window.onload = function () {
    var ranges = arrayByClassName(document, 'double-range')
        .reduce(function (prev, htmlNodes) {
            return prev.concat(arrayByClassName(htmlNodes, 'double-range__thumb'));
        }, []).filter(function (htmlNode) {
            return htmlNode.type === 'range';
        });

    var isIE = detectIE();
  
    ranges.forEach(function (range) {
        range = new RangeSlider(range)

        if (isIE) {
            range.range1.style.top = "8px";
            range.range1.style.pointerEvents = "auto";

            range.range2.style.top = "18px";
            range.range2.style.pointerEvents = "auto";

            range.el.addEventListener('change', function() { // not 'input' change for cross-compatibility
                range.update();
            });
        } else {
            range.el.addEventListener('input', function() {
                range.update();
            });
        }


        range.update();
    });
}

/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
