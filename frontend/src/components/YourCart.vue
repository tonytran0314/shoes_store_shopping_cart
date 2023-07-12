<script>
    // import axios from 'axios'

    export default {
        data() {
            return {
                cartItems: []
            }
        },
        mounted() {
            // axios.get('http://localhost:8000/api/v1/cart_items').then(response => this.cartItems = response.data)
            if (localStorage.cartItems) {
                this.cartItems = JSON.parse(localStorage.cartItems)
            }

        },
        computed: {
            totalPrice() {
                totalPrice = 0
                cartItems.foreach(item => {
                    this.totalPrice += (item.quantity * item.price)
                })
                return this.totalPrice
            }
        },
        methods: {
            removeItem: function (shoes) {
                this.cartItems = JSON.parse(localStorage.cartItems)
                this.cartItems.foreach(function(item, index) {
                console.log(item.id)
                //     if(shoes.id == item.id) {
                //         this.cartItems = this.cartItems.splice(index, 1)
                //     }
                })
                // localStorage.cartItems = JSON.stringify(this.cartItems)
            }
        }
    }


</script>

<template>
    <div class="mainCard" id="yourCart">
        <div id="yourCartContent">
            <div id="yourCartHeader">
                <div class="logo">
                    <img src="../assets/images/nike.png" alt="">
                </div>
                <div id="yourCartTitle">
                    Your Cart
                    <span>$653.15</span>
                </div>
            </div>
            <div id="yourCartBody">
                <div>
                    <!-- <div class="emptyCart">Your cart is empty.</div> -->
                    <div class="cartItems" v-for="item in cartItems">
                        <div class="itemImage" :style="{'background-color': item.color}">
                            <img :src="item.image">
                        </div>
                        <div class="itemInformation">
                            <div class="itemName">{{ item.name }}</div>
                            <div class="itemPrice">${{ item.price }}</div>
                            <div class="itemAction">
                                <div class="itemQuantity">
                                    <div class="minus"><img src="../assets/images/minus.png"></div>
                                    <div class="quantity">{{ item.quantity }}</div>
                                    <div class="plus"><img src="../assets/images/plus.png"></div>
                                </div>
                                <div class="itemRemoveButton" @click="removeItem(item)">
                                    <img src="../assets/images/trash.png">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    #yourCart {
        width: 360px;
        height: 600px;
        background-color: #FFFFFF;
        border-radius: 40px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        position: relative;
        overflow: hidden;
        padding: 0 28px;
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

    .logo {
        margin: 12px 0;
    }

    .logo img {
        width: 50px;
        height: 26px;
    }

    #yourCartTitle {
        font-size: 24px;
        font-weight: 700;
        margin: 16px 0;
    }

    #yourCartContent {
        position: relative;
        z-index: 99;
    }

    #yourCartTitle span {
        float: right;
    }

    .cartItems {
        display: flex;
        /* justify-content: space-between; */
        padding: 20px 0;
    }

    .cartItems:last-child {
        padding-bottom: 60px;
    }
    .itemImage {
        min-width: 90px;
        max-width: 90px;
        height: 90px;
        border-radius: 100%;
        margin-right: 34px;
    }

    .itemImage img {
        width: 140%;
        transform: rotate(-28deg) translateY(-40px);
        filter: drop-shadow(0 30px 20px rgba(0,0,0,.2));
    }

    .itemName {
        font-size: 14px;
        font-weight: 700;
        line-height: 1.5;
        margin-bottom: 10px;
    }

    .itemPrice {
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 16px;
    }

    .itemAction {
        display: flex;
        justify-content: space-between;
    }

    .itemRemoveButton {
        width: 28px;
        height: 28px;
        background-color: #F6C90E;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: .2s;
        margin-left: 60px;
    }

    .itemRemoveButton:hover {
        background-color: #f8d43f;
        box-shadow: -2px 2px 4px rgba(0,0,0,.15);
    }

    .itemRemoveButton img {
        width: 16px;
        height: 16px;
    }

    .itemQuantity {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .minus, .plus {
        cursor: pointer;
        width: 28px;
        height: 28px;
        border-radius: 50%;
        background-color: #eee;
        text-align: center;
        line-height: 25px;
        transition: .2s ease;
    }

    .minus:hover, .plus:hover {
        background-color: #ddd;
    }

    .minus img, .plus img {
        width: 8px;
        height: 8px;
    }

    .quantity {
        font-size: 14px;
        margin: 0 8px;
        width: 20px;
        text-align: center;
        line-height: 14px;
        color: #303841;
    }

    #yourCartBody {
        height: 497px;
        position: relative;
        overflow-y: scroll;
        scrollbar-width: none;
    }

    #yourCartBody::-webkit-scrollbar {
        display: none;
    }

    .emptyCart {
        font-size: 14px;
    }
</style>