require('./bootstrap');

import Swiper from 'swiper/bundle';
// import Swiper styles
import 'swiper/swiper-bundle.css';
import { createApp } from 'vue';
import navbar from './components/navbar.vue';
import shopForm from './components/shop-form.vue';

createApp({
    components: {
        'navbar-component': navbar,
        'shop-form-component': shopForm,
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
