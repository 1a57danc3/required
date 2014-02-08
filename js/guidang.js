jQuery(document).ready(function($) {   
    var old_top = $("#archives").offset().top,   
        _year = parseInt($(".year:first").attr("id").replace("year-", ""));   
    $(".year:first, .year .month:first").addClass("selected");   
    $(".month.monthed").click(function() {   
        var _this = $(this),   
            _id = "#" + _this.attr("id").replace("mont", "arti");   
        if (!_this.hasClass("selected")) {   
            var _stop = $(_id).offset().top - 10,   
                _selected = $(".month.monthed.selected");   
            _selected.removeClass("selected");   
            _this.addClass("selected");   
            $("body, html").scrollTop(_stop)   
        }   
    });   
    $(".year-toogle").click(function(e) {   
        e.preventDefault();   
        var _this = $(this),   
            _thisp = _this.parent();   
        if (!_thisp.hasClass("selected")) {   
            var _selected = $(".year.selected"),   
                _month = _thisp.children("ul").children("li").eq(0);   
            _selected.removeClass("selected");   
            _thisp.addClass("selected");   
            _month.click()   
        }   
    });   
    $(window).scroll(function() {   
        var _this = $(this),   
            _top = _this.scrollTop();   
        if (_top >= old_top + 10) {   
            $(".archive-nav").css({   
                top: 10   
            })   
        } else {   
            $(".archive-nav").css({   
                top: old_top + 10 - _top   
            })   
        }   
        $(".archive-title").each(function() {   
            var _this = $(this),   
                _ooid = _this.attr("id"),   
                _newyear = parseInt(_ooid.replace(/arti-(\d*)-\d*/, "$1")),   
                _offtop = _this.offset().top - 40,   
                _oph = _offtop + _this.height();   
            if (_top >= _offtop && _top < _oph) {   
                if (_newyear != _year) {   
                    $("#year-" + _year).removeClass("selected");   
                    $("#year-" + _newyear).addClass("selected");   
                    _year = _newyear   
                }   
                var _id = _id = "#" + _ooid.replace("arti", "mont"),   
                    _selected = $(".month.monthed.selected");   
                _selected.removeClass("selected");   
                $(_id).addClass("selected")   
            }   
        })   
    })   
});  