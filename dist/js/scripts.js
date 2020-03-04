// Javascript A
console.log('Javascript A');
// Javascript B
console.log('Javascript B');

$(document).ready(function(){
    $("p").click(function(){
      $(this).hide();
    });
  });
// Javascript A
console.log('Javascript C');
// Javascript B
console.log('Javascript D');