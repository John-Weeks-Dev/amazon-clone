<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import { toRefs, computed } from 'vue'

import { useCartStore } from '@/store/cart'
import { storeToRefs } from 'pinia';
const cartStore = useCartStore()
const { cart } = storeToRefs(cartStore)

const removeFromCart = (id) => {
    cartStore.removeProductFromCart(id)
}

const total = computed(() => {
    let total = 0
    cart.value.forEach(c => {
        total += c.price
    })
    if (total > 0) {
        return total.toFixed(2)
    }
    return 0
})

const totalWithoutDot = () => {
    let num = String(total.value).split('.').join('')
    return Number(num)
}
</script>

<template>
    <Head title="Cart" />

    <AuthenticatedLayout>
        <div class="flex gap-4">
            <div class="w-full bg-white p-4 mt-4">
                <div class="border-b">
                    <div class="text-[27px] font-semibold">Shopping Cart</div>
                    <div class="text-sm w-full flex justify-end items-center font-semibold">Price</div>
                </div>

                <div v-if="!cart.length" class="text-center font-bold text-2xl py-20">
                    Your Amazon Cart is empty
                </div>

                <div v-else class="flex border-b" v-for="product in cart" :key="product">
                    <img class="h-[180px] mt-4 mb-4" :src="product.image" />
                    <div class="flex justify-between mb-4">
                        <div class="pl-8 py-10 relative">
                            <div class="text-gray-900 pb-2 -mt-4 font-bold text-[18px]">{{ product.title }}</div>
                            <span>{{ product.description.substring(0, 180) }}...</span>
                            <div class="text-teal-600 py-2">In Stock</div>
                            <div class="text-teal-600 absolute bottom-0 mb-4 flex items-center">
                                <div @click="removeFromCart(product.id)" class="text-sm hover:underline cursor-pointer">
                                    Delete
                                </div>
                            </div>
                        </div>

                        <div class="py-10 justify-end">
                            <div class="font-bold pl-20">${{ product.price }}</div>
                        </div>
                    </div>
                </div>

                <div class="font-extrabold text-[18px] pt-4 text-right">Subtotal (Items: {{ cart.length }}): ${{ total }}</div>
            </div>

            <div class="bg-white w-[350px] p-4 mt-4 h-48">
                <div class="text-sm text-green-700">
                    Welcome to Amazon! FREE Delivery on your first order to UK or Ireland.
                    Select this option at checkout.
                </div>
                <div class="font-extrabold text-[18px] pt-4">Subtotal (Items: {{ cart.length }}): ${{ total }}</div>
                <Link
                    class="
                        block
                        mt-4
                        w-full
                        text-center
                        py-1
                        font-bold
                        text-sm
                        rounded-lg
                        border
                        shadow-sm
                        cursor-pointer
                    "
                    :disabled="Number(total) === 0.00"
                    :class="Number(total) === 0.00 ? 'bg-gray-400' : 'bg-yellow-400 hover:bg-yellow-500'"
                    as="button"
                    :method="!$page.props.auth.user ? 'get' : 'post'"
                    :href="
                        $page.props.auth.user !== null
                            ? route('checkout.store', {
                                total: totalWithoutDot(),
                                total_decimal: total,
                                items: cart
                            })
                            : route('login')
                    "
                >
                    Proceed to Checkout
                </Link>
            </div>
        </div>
    </AuthenticatedLayout>
</template>


