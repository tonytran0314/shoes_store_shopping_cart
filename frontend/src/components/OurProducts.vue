<script>
    import axios from 'axios'
import { getTransitionRawChildren } from 'vue'

    export default {
        data() {
            return {
                shoesList: [],
                cartItems: []
            }
        },
        methods: {
            addToCart: function (shoes) {

                if (localStorage.cartItems) {
                    this.cartItems = JSON.parse(localStorage.cartItems)
                }
                shoes.quantity = 1  
                this.cartItems.push(shoes)
                localStorage.cartItems = JSON.stringify(this.cartItems)
                
            }
        },  
        mounted() {
            axios.get('http://localhost:8000/api/v1/show_shoes').then(response => this.shoesList = response.data)

            if (localStorage.cartItems) {
                this.cartItems = JSON.parse(localStorage.cartItems)
            }
            console.log(this.cartItems)
        },
    }

</script>

<template>
    <div class="mainCard" id="ourProducts">
        <div id="ourProductsContent">
            <div id="ourProductsHeader">
                <div class="logo">
                    <img src="../assets/images/nike.png" alt="">
                </div>
                <div id="ourProductsTitle">Our Products</div>
            </div>
            <div id="ourProductBody">
                <div v-for="shoes in shoesList">
                    <div class="shoesCard">
                        <div class="shoesImg" :style="{'background-color': shoes.color}">
                            <img :src="shoes.image">
                        </div>
                        <div class="shoesName">{{ shoes.name }}</div>
                        <div class="shoesDescription">{{ shoes.description }}</div>
                    </div>
                    
                    <div class="shoesBottom">
                        <div class="shoesPrice">${{ shoes.price }}</div>
                        <div class="addToCartButton" @click="addToCart(shoes)">Add to cart</div>
                        <div class="tick">
                            <img src="../assets/images/check.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    #ourProducts {
        width: 360px;
        height: 600px;
        background-color: #FFFFFF;
        border-radius: 40px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        margin-bottom: 40px;
        position: relative;
        padding: 0 28px;
        overflow: hidden;
    }

    .tick {
        width: 46px;
        height: 46px;
        background-color:#F6C90E;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .tick img {
        width: 20px;
        height: 20px;
    }

    #ourProductsContent {
        position: relative;
        z-index: 99;
    }

    .shoesBottom {
        margin-bottom: 40px;
    }

    .logo {
        margin: 12px 0;
    }

    #ourProductsHeader img {
        width: 50px;
        height: 26px;
    }

    #ourProductBody {
        height: 497px;
        position: relative;
        overflow-y: scroll;
        scrollbar-width: none;
    }

    #ourProductBody::-webkit-scrollbar {
        display: none;
    }

    .shoesImg {
        width: 304px;
        height: 380px;
        border-radius: 40px;
    }

    .shoesImg img {
        filter: drop-shadow(0 30px 20px rgba(0,0,0,.2));
        transform: rotate(-24deg);
        width: 100%;
        margin-left: -16px;
    }

    .shoesName {
        font-size: 20px;
        font-weight: 700;
        margin: 26px 0 20px;
        line-height: 1.5;
    }

    .shoesDescription {
        font-size: 13px;
        color: #777;
        line-height: 1.8;
        margin-bottom: 20px;
    }

    .shoesBottom {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .shoesPrice {
        font-size: 18px;
        font-weight: 700;
    }

    .addToCartButton {
        cursor: pointer;
        background-color: #f6c90e;
        font-weight: 700;
        font-size: 14px;
        box-sizing: border-box;
        width: auto;
        height: 46px;
        min-width: 46px;
        padding: 16px 20px;
        border-radius: 100px;
        transition: all .25s ease;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        white-space: nowrap;
        position: relative;
        display: flex;
        align-items: center;
        overflow: hidden;
        text-transform: uppercase;
    }

    .addToCartButton:hover {
        background-color: #f8d43f;
        box-shadow: -2px 2px 4px rgba(0,0,0,.15);
    }

    #ourProductsTitle {
        font-size: 24px;
        font-weight: 700;
        margin: 16px 0;
    }

    .mainCard::before {
        content: '';
        width: 300px;
        height: 300px;
        position: absolute;
        background-color: #F6C90E;
        z-index: 0;
        border-radius: 50%;
        top: -20%;
        left: -50%;
    }
</style>