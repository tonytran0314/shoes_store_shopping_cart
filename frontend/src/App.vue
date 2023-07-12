<script setup>
import OurProducts from './components/OurProducts.vue'
import YourCart from './components/YourCart.vue'
</script>

<template>
  <div id="wrapper">
    <OurProducts />
    <YourCart />
  </div>
  <div id="wave">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#F6C90E" fill-opacity="1" d="M0,192L60,176C120,160,240,128,360,117.3C480,107,600,117,720,144C840,171,960,213,1080,218.7C1200,224,1320,192,1380,176L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
    <div id="overlay"></div>
  </div>
</template>

<style scoped>
  
  #wrapper {
    width: 760px;
    height: 600px;
    display: flex;
    justify-content: space-between;
    margin: auto;
    position: relative;
    z-index: 2;
  }

  #wave svg {
    width: 100%;
    min-width: 1920px;
    position: fixed;
    left: 0;
    bottom: 0;
    z-index: 1;
    animation-name: moving;
    animation-duration: 20s;
    animation-iteration-count: infinite;
  }

  #overlay {
    position: fixed;
    left: 0;
    bottom: 0;
    z-index: 1;
    width: 100%;
    height: 170px;
    background-color: #F6C90E;
  }



  @keyframes moving {
    0%   { bottom: 100px }
    50%  { bottom: 170px }
    100% { bottom: 100px }
  }

  @media screen and (max-width: 800px) {
    #wrapper {
      width: 360px;
      margin: 20px auto;
      flex-direction: column;
      height: auto;
    }
  }
</style>
