// navbar section 
const bar = document.getElementById('bar');
const close = document.getElementById('close');
const nav = document.getElementById('navbar');

if (bar) {
    bar.addEventListener('click', () => {
        nav.classList.add('active');
    });
}

if (close) {
    close.addEventListener('click', () => {
        nav.classList.remove('active');
    });
}

// singleProject Section
var mainImg = document.getElementById("main-img");
var smallImg = document.getElementsByClassName("small-img");


smallImg[0].onclick =  function(){
    mainImg.src = smallImg[0].src;
}
smallImg[1].onclick =  function(){
    mainImg.src = smallImg[1].src;
}
smallImg[2].onclick = function(){
    mainImg.src = smallImg[2].src;
}
smallImg[3].onclick = function(){
    mainImg.src = smallImg[3].src;
}




//payment page div selctor

// Function to handle the selection of payment options
function selectPaymentOption(option) {
    const paymentOptions = document.querySelectorAll('.pay-opt');
    paymentOptions.forEach(opt => opt.classList.remove('selected'));
    option.classList.add('selected');
  
    // Enable the "Place Order" button when a payment option is selected
    const placeOrderButton = document.querySelector('.order-btn');
    placeOrderButton.style.pointerEvents = 'auto';
    placeOrderButton.style.opacity = 1;
  }
  
  // Function to handle the "Place Order" button click
  function placeOrder() {
    const selectedPaymentOption = document.querySelector('.pay-opt.selected img');
    if (selectedPaymentOption) {
      // Perform the action to place the order based on the selected payment option
      // For this example, we simply log the selected payment option's alt text.
      console.log('Placing order with payment option:', selectedPaymentOption.alt);
      // You can add your actual logic here to process the payment and complete the order.
    }
  }

  
  