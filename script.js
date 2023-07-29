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
//add to cart
// Initialize the cart as an empty array to store selected products
let cartItems = [];

// Function to add a product to the cart
function addToCart(productName, price, image) {
  const product = { name: productName, price: price, image: image };
  cartItems.push(product);
  updateCartCount();
  saveCartToLocalStorage(); // Save the cart data to local storage
}

// Function to update the cart count in the header
function updateCartCount() {
  const cartCount = document.getElementById("cart-count");
  cartCount.innerText = cartItems.length;
}

// Function to save the cart data to local storage
function saveCartToLocalStorage() {
  localStorage.setItem("cartItems", JSON.stringify(cartItems));
}

// Function to load cart data from local storage (if available) on page load
function loadCartFromLocalStorage() {
  const cartData = localStorage.getItem("cartItems");
  if (cartData) {
    cartItems = JSON.parse(cartData);
    updateCartCount();
  }
}

// Call loadCartFromLocalStorage when the page loads
loadCartFromLocalStorage();



// Function to display cart items on the cart.html page
function displayCartItems() {
    const cartList = document.getElementById("cart-items");
    cartList.innerHTML = "";

    cartItems.forEach(item => {
      const cartItem = document.createElement("div");
      cartItem.classList.add("cart-item");

      const productImage = document.createElement("img");
      productImage.src = `img/products/${item.image}`;
      productImage.alt = item.name;
      cartItem.appendChild(productImage);

      const productDetails = document.createElement("div");
      productDetails.classList.add("product-details");

      const productName = document.createElement("h5");
      productName.innerText = item.name;
      productDetails.appendChild(productName);

      const productPrice = document.createElement("h4");
      productPrice.innerText = `Rs. ${item.price}`;
      productDetails.appendChild(productPrice);

      cartItem.appendChild(productDetails);
      cartList.appendChild(cartItem);
    });
  }

  // Call displayCartItems to show cart items on page load
  displayCartItems();