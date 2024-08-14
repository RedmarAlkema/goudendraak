<template>
    <div class="cart-icon-container">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
        </svg>
        <span v-if="cartItemCount > 0" class="cart-count">{{ cartItemCount }}</span>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            cartItemCount: 0, // Houdt het aantal items in de winkelwagen bij
        };
    },
    mounted() {
        this.updateCartCount(); // Update de teller zodra het component is gemonteerd
    },
    methods: {
        updateCartCount() {
            axios.get('/cart/count')
                .then(response => {
                    this.cartItemCount = response.data.count;
                })
                .catch(error => {
                    console.error('Er is een fout opgetreden bij het ophalen van de winkelwagenteller:', error);
                });
        }
    },
};
</script>

<style scoped>
.cart-icon-container {
    position: fixed;
    top: 20px;
    right: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.size-6 {
    width: 24px;
    height: 24px;
    color: #000;
}

.cart-count {
    background-color: red;
    color: white;
    border-radius: 50%;
    padding: 2px 6px;
    font-size: 12px;
    margin-left: -10px;
    margin-top: -10px;
    position: absolute;
    top: 0;
    right: 0;
}
</style>
