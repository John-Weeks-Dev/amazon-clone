<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import { toRefs } from 'vue';

const props = defineProps({ product: Object });
const { product } = toRefs(props)
</script>

<template>
    <div class="border border-gray-300 rounded-md bg-white p-1.5">
        <Link :href="route('product.index', { id: product.id })" class="w-full">
            <img class="rounded-md" :src="product.image">
            <div class="text-left">
                <div class="text-[16px] text-gray-900 font-extrabold cursor-pointer">
                    {{ product.title }}
                </div>
                <div class="flex justify-between items-center">
                    <div class="text-2xl p-1 font-semibold w-full text-left">${{ product.price }}</div>
                    <img width="80" src="/images/logo/PRIME_LOGO.PNG">
                </div>
                <div class="flex justify-between items-center">
                    <div class="text-md p-1 font-semibold w-full text-left">In Stock</div>
                </div>
                <div class="flex justify-between items-center">
                    <img width="80" src="/images/STARS.PNG">
                </div>
            </div>
        </Link>
    </div>
</template>


