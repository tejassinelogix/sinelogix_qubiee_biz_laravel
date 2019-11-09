$(document).ready(function() {
  //countdown timer
  $('#countdownClock').countdowntimer({
      dateAndTime:"2019/02/30 00:00:00",
      size:"lg",
      //timeSeparator : "-"
      /*regexpMatchFormat:"([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})",
      regexpReplaceWith:"$1<sup>days</sup> / $2<sup>hours</sup> / $3<sup>minutes</sup> / $4<sup>seconds</sup>"*/
  });
});