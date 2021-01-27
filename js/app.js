
function resizeImgCard() {
  let imgCard = $('.card').children("img")
  let imgWidth = imgCard.width();
  imgCard.css({'height':imgWidth+'px'});
}

// Resize card images on loading page
$( window ).on('load', function() {
  //window.scrollTo(0, 0);
  path = $(location).attr('href')
  console.log(path)
  if(path.includes("#")){
    id_name = path.split("#")
    jumpTo = 'a[href^="#' + id_name[1] +'"]'

    console.log(id_name, jumpTo)
    $(jumpTo).trigger('click')
  }
  resizeImgCard();
})

// Resize card images on resizing screen 
$( window ).on('resize', function() {
  resizeImgCard();
});

$(document).on('click', 'a[href^="#"]', function(e) {
  // target element id
  let id = $(this).attr('href');
  $('.active').removeClass('active')

  // target element
  let targetElement = $(id);
  //$('.active').removeClass('active');
  //$(this).addClass('active')

  $('a[href^="'+ id +'"]').addClass('active')
  
  
  if (targetElement.length === 0) {
      return;
  }
});

var QtyInput = (function () {
  var $qtyInputs = $(".qty-input").not('.excluded');

  if (!$qtyInputs.length) {
    return;
  }

  var $inputs = $qtyInputs.find(".product-qty");
  var $countBtn = $qtyInputs.find(".qty-count");
  var qtyMin = parseInt($inputs.attr("min"));
  var qtyMax = parseInt($inputs.attr("max"));

  $inputs.change(function () {
    var $this = $(this);
    var $minusBtn = $this.siblings(".qty-count--minus");
    var $addBtn = $this.siblings(".qty-count--add");
    var qty = parseInt($this.val());

    if (isNaN(qty) || qty <= qtyMin) {
      $this.val(qtyMin);
      $minusBtn.attr("disabled", true);
    } else {
      $minusBtn.attr("disabled", false);
      
      if(qty >= qtyMax){
        $this.val(qtyMax);
        $addBtn.attr('disabled', true);
      } else {
        $this.val(qty);
        $addBtn.attr('disabled', false);
      }
    }
  });

  $countBtn.click(function () {
    var operator = this.dataset.action;
    var $this = $(this);
    var $input = $this.siblings(".product-qty");
    var qty = parseInt($input.val());

    if (operator == "add") {
      qty += 1;
      if (qty >= qtyMin + 1) {
        $this.siblings(".qty-count--minus").attr("disabled", false);
      }

      if (qty >= qtyMax) {
        $this.attr("disabled", true);
      }
    } else {
      qty = qty <= qtyMin ? qtyMin : (qty -= 1);
      
      if (qty == qtyMin) {
        $this.attr("disabled", true);
      }

      if (qty < qtyMax) {
        $this.siblings(".qty-count--add").attr("disabled", false);
      }
    }

    $input.val(qty);
  });
})();

function showSuccessAddedItem() {
  var toastElList = [].slice.call(document.querySelectorAll('.toast'))
  var toastList = toastElList.map(function (toastEl) {
    return new bootstrap.Toast(toastEl, {
      delay: 4000
    })
  })
  toastList.forEach(toast => toast.show());
}