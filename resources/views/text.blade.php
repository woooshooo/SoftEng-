<html>
    <head>
         <title>Dynamically Add or Remove input fields in PHP with JQuery</title>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <style>
    ul.bs-autocomplete-menu {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  max-height: 200px;
  overflow: auto;
  z-index: 9999;
  border: 1px solid #eeeeee;
  border-radius: 4px;
  background-color: #fff;
  box-shadow: 0px 1px 6px 1px rgba(0, 0, 0, 0.4);
}

ul.bs-autocomplete-menu a {
  font-weight: normal;
  color: #333333;
}

.ui-helper-hidden-accessible {
  border: 0;
  clip: rect(0 0 0 0);
  height: 1px;
  margin: -1px;
  overflow: hidden;
  padding: 0;
  position: absolute;
  width: 1px;
}

.ui-state-active,
.ui-state-focus {
  color: #23527c;
  background-color: #eeeeee;
}

.bs-autocomplete-feedback {
  width: 1.5em;
  height: 1.5em;
  overflow: hidden;
  margin-top: .5em;
  margin-right: .5em;
}

.loader {
  font-size: 10px;
  text-indent: -9999em;
  width: 1.5em;
  height: 1.5em;
  border-radius: 50%;
  background: #333;
  background: -moz-linear-gradient(left, #333333 10%, rgba(255, 255, 255, 0) 42%);
  background: -webkit-linear-gradient(left, #333333 10%, rgba(255, 255, 255, 0) 42%);
  background: -o-linear-gradient(left, #333333 10%, rgba(255, 255, 255, 0) 42%);
  background: -ms-linear-gradient(left, #333333 10%, rgba(255, 255, 255, 0) 42%);
  background: linear-gradient(to right, #333333 10%, rgba(255, 255, 255, 0) 42%);
  position: relative;
  -webkit-animation: load3 1.4s infinite linear;
  animation: load3 1.4s infinite linear;
  -webkit-transform: translateZ(0);
  -ms-transform: translateZ(0);
  transform: translateZ(0);
}

.loader:before {
  width: 50%;
  height: 50%;
  background: #333;
  border-radius: 100% 0 0 0;
  position: absolute;
  top: 0;
  left: 0;
  content: '';
}

.loader:after {
  background: #fff;
  width: 75%;
  height: 75%;
  border-radius: 50%;
  content: '';
  margin: auto;
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
}

@-webkit-keyframes load3 {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}

@keyframes load3 {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
    </style>
    <body>
      <div class="container">
<h1>jQuery UI autocomplete for Bootstrap</h1>
<p>Demo version with local data.</p>
<div class="row">
 <div class="col-xs-7">
   <div class="form-group">
     <label for="ac-demo" class="control-label">Autocomplete demo</label>
     <input class="form-control bs-autocomplete" id="ac-demo" value="" placeholder="Type the first two characters of a city name..." type="text" data-source="demo_source.php" data-hidden_field_id="city-code" data-item_id="id" data-item_label="cityName" autocomplete="off">
   </div>
 </div>
 <div class="col-xs-3">
   <div class="form-group">
     <label for="city-code" class="control-label">“Hidden” field</label>
     <input class="form-control" id="city-code" name="citycode" value="" type="number" readonly>
     <span class="help-block">This field should be hidden!</span>
   </div>
 </div>
</div>
<p>Spinner icon from <a href="https://projects.lukehaas.me/css-loaders">https://projects.lukehaas.me/css-loaders</a>/</p>
<p>Remote source version: <a href="https://github.com/massimo-cassandro/jQueryUI-autocomplete-bootstrap">https://github.com/massimo-cassandro/jQueryUI-autocomplete-bootstrap</a></p>
</div>
    </body>
</html>
<script>
$.widget("ui.autocomplete", $.ui.autocomplete, {

  _renderMenu: function(ul, items) {
    var that = this;
    ul.attr("class", "nav nav-pills nav-stacked  bs-autocomplete-menu");
    $.each(items, function(index, item) {
      that._renderItemData(ul, item);
    });
  },

  _resizeMenu: function() {
    var ul = this.menu.element;
    ul.outerWidth(Math.min(
      // Firefox wraps long text (possibly a rounding bug)
      // so we add 1px to avoid the wrapping (#7513)
      ul.width("").outerWidth() + 1,
      this.element.outerWidth()
    ));
  }

});

(function() {
  "use strict";
  var cities = [{
    "id": 1,
    "cityName": "Amsterdam"
  }, {
    "id": 2,
    "cityName": "Athens"
  }, {
    "id": 3,
    "cityName": "Baghdad"
  }, {
    "id": 4,
    "cityName": "Bangkok"
  }, {
    "id": 5,
    "cityName": "Barcelona"
  }, {
    "id": 6,
    "cityName": "Beijing"
  }, {
    "id": 7,
    "cityName": "Belgrade"
  }, {
    "id": 8,
    "cityName": "Berlin"
  }, {
    "id": 9,
    "cityName": "Bogota"
  }, {
    "id": 10,
    "cityName": "Bratislava"
  }, {
    "id": 11,
    "cityName": "Brussels"
  }, {
    "id": 12,
    "cityName": "Bucharest"
  }, {
    "id": 13,
    "cityName": "Budapest"
  }, {
    "id": 14,
    "cityName": "Buenos Aires"
  }, {
    "id": 15,
    "cityName": "Cairo"
  }, {
    "id": 16,
    "cityName": "CapeTown"
  }, {
    "id": 17,
    "cityName": "Caracas"
  }, {
    "id": 18,
    "cityName": "Chicago"
  }, {
    "id": 19,
    "cityName": "Copenhagen"
  }, {
    "id": 20,
    "cityName": "Dhaka"
  }, {
    "id": 21,
    "cityName": "Dubai"
  }, {
    "id": 22,
    "cityName": "Dublin"
  }, {
    "id": 23,
    "cityName": "Frankfurt"
  }, {
    "id": 24,
    "cityName": "Geneva"
  }, {
    "id": 25,
    "cityName": "Hanoi"
  }, {
    "id": 26,
    "cityName": "Helsinki"
  }, {
    "id": 27,
    "cityName": "Hong Kong"
  }, {
    "id": 28,
    "cityName": "Istanbul"
  }, {
    "id": 29,
    "cityName": "Jakarta"
  }, {
    "id": 30,
    "cityName": "Jerusalem"
  }, {
    "id": 31,
    "cityName": "Johannesburg"
  }, {
    "id": 32,
    "cityName": "Kabul"
  }, {
    "id": 33,
    "cityName": "Karachi"
  }, {
    "id": 34,
    "cityName": "Kiev"
  }, {
    "id": 35,
    "cityName": "Kuala Lumpur"
  }, {
    "id": 36,
    "cityName": "Lagos"
  }, {
    "id": 37,
    "cityName": "Lahore"
  }, {
    "id": 38,
    "cityName": "Lima"
  }, {
    "id": 39,
    "cityName": "Lisbon"
  }, {
    "id": 40,
    "cityName": "Ljubljana"
  }, {
    "id": 41,
    "cityName": "London"
  }, {
    "id": 42,
    "cityName": "Los Angeles"
  }, {
    "id": 43,
    "cityName": "Luxembourg"
  }, {
    "id": 44,
    "cityName": "Madrid"
  }, {
    "id": 45,
    "cityName": "Manila"
  }, {
    "id": 46,
    "cityName": "Marrakesh"
  }, {
    "id": 47,
    "cityName": "Melbourne"
  }, {
    "id": 48,
    "cityName": "Mexico City"
  }, {
    "id": 49,
    "cityName": "Montreal"
  }, {
    "id": 50,
    "cityName": "Moscow"
  }, {
    "id": 51,
    "cityName": "Mumbai"
  }, {
    "id": 52,
    "cityName": "Nairobi"
  }, {
    "id": 53,
    "cityName": "New Delhi"
  }, {
    "id": 54,
    "cityName": "NewYork"
  }, {
    "id": 55,
    "cityName": "Nicosia"
  }, {
    "id": 56,
    "cityName": "Oslo"
  }, {
    "id": 57,
    "cityName": "Ottawa"
  }, {
    "id": 58,
    "cityName": "Paris"
  }, {
    "id": 59,
    "cityName": "Prague"
  }, {
    "id": 60,
    "cityName": "Reykjavik"
  }, {
    "id": 61,
    "cityName": "Riga"
  }, {
    "id": 62,
    "cityName": "Rio de Janeiro"
  }, {
    "id": 63,
    "cityName": "Rome"
  }, {
    "id": 64,
    "cityName": "Saint Petersburg"
  }, {
    "id": 65,
    "cityName": "San Francisco"
  }, {
    "id": 66,
    "cityName": "Santiago de Chile"
  }, {
    "id": 67,
    "cityName": "São Paulo"
  }, {
    "id": 68,
    "cityName": "Seoul"
  }, {
    "id": 69,
    "cityName": "Shanghai"
  }, {
    "id": 70,
    "cityName": "Singapore"
  }, {
    "id": 71,
    "cityName": "Sofia"
  }, {
    "id": 72,
    "cityName": "Stockholm"
  }, {
    "id": 73,
    "cityName": "Sydney"
  }, {
    "id": 74,
    "cityName": "Tallinn"
  }, {
    "id": 75,
    "cityName": "Tehran"
  }, {
    "id": 76,
    "cityName": "The Hague"
  }, {
    "id": 77,
    "cityName": "Tokyo"
  }, {
    "id": 78,
    "cityName": "Toronto"
  }, {
    "id": 79,
    "cityName": "Venice"
  }, {
    "id": 80,
    "cityName": "Vienna"
  }, {
    "id": 81,
    "cityName": "Vilnius"
  }, {
    "id": 82,
    "cityName": "Warsaw"
  }, {
    "id": 83,
    "cityName": "Washington D.C."
  }, {
    "id": 84,
    "cityName": "Wellington"
  }, {
    "id": 85,
    "cityName": "Zagreb"
  }];

  $('.bs-autocomplete').each(function() {
    var _this = $(this),
      _data = _this.data(),
      _hidden_field = $('#' + _data.hidden_field_id);

    _this.after('<div class="bs-autocomplete-feedback form-control-feedback"><div class="loader">Loading...</div></div>')
      .parent('.form-group').addClass('has-feedback');

    var feedback_icon = _this.next('.bs-autocomplete-feedback');
    feedback_icon.hide();

    _this.autocomplete({
        minLength: 2,
        autoFocus: true,

        source: function(request, response) {
          var _regexp = new RegExp(request.term, 'i');
          var data = cities.filter(function(item) {
            return item.cityName.match(_regexp);
          });
          response(data);
        },

        search: function() {
          feedback_icon.show();
          _hidden_field.val('');
        },

        response: function() {
          feedback_icon.hide();
        },

        focus: function(event, ui) {
          _this.val(ui.item[_data.item_label]);
          event.preventDefault();
        },

        select: function(event, ui) {
          _this.val(ui.item[_data.item_label]);
          _hidden_field.val(ui.item[_data.item_id]);
          event.preventDefault();
        }
      })
      .data('ui-autocomplete')._renderItem = function(ul, item) {
        return $('<li></li>')
          .data("item.autocomplete", item)
          .append('<a>' + item[_data.item_label] + '</a>')
          .appendTo(ul);
      };
    // end autocomplete
  });
})();
</script>
