$.ajax({
  url: './../twitter.php',
  success: function(data) {
    if (data !== 'failed') {
      var data = $.parseJSON(data);
      var i = 0;
      for (var key in data) {
        var tweet = $('.tweet:nth-child(' + (i + 1) + ')');
        tweet.children('.text').text(data[key].text);
        tweet.children('.datetime').children('a').attr('href', 'http://twitter.com/invendu/status/' + data[key].id).text(data[key].datetime);
        i++;
      }
    }
  }
});
