require('./bootstrap');

import Swiper from 'swiper/bundle';
// import Swiper styles
import 'swiper/swiper-bundle.css';
import { createApp } from 'vue';
import navbar from './components/navbar.vue';
import shopForm from './components/shop-form.vue';
import shopImage from './components/shop-image.vue';
import catFooter from './components/cat-footer.vue';
import shippingSelect from './components/shipping-select.vue';

createApp({
    components: {
        'navbar-component': navbar,
        'shop-form-component': shopForm,
        'shop-image': shopImage,
        'cat-footer': catFooter,
        'shipping-select': shippingSelect,
    }
}).mount("#app");

const swiper1 = new Swiper('.swiper-1', {
  slidesPerView: 1,
  spaceBetween: 30,
  loop: true,
  lazy: true,
  autoplay: {
      delay: 2500,
      disableOnInteraction: false,
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});

var swiper = new Swiper('.swiper', {
  slidesPerView: 1,
  spaceBetween: 30,
  slidesPerGroup: 1,
  loop: true,
  loopFillGroupWithBlank: true,
  breakpoints: { 769: { slidesPerView: 5, slidesPerGroup: 5 } },
  pagination: {
    el: '.swiper-pagination',
    type: 'progressbar',
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
},
});
