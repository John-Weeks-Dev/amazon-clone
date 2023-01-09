<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

import 'vue3-carousel/dist/carousel.css'
import { Carousel, Navigation, Slide } from 'vue3-carousel'
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <Carousel :items-to-show="1" :wrap-around="true">
            <Slide v-for="slide in 6" :key="slide">
                <div class="carousel__item">
                    <img id="slider" :src="`images/carousel/slide${slide}.jpg`" alt="">
                </div>
            </Slide>

            <template #addons>
                <Navigation />
            </template>
        </Carousel>

        <div class="relative -mt-[300px]">
            <div class="flex m-4 z-10 relative">
                <div class="bg-white mx-2 p-2 text-md w-full text-center">
                    You are on amazon.com You can also shop on Amazon UK for millions of products with fast local delivery.
                    <span class="underline text-teal-600 cursor-pointer">Click here to go to amazon.co.uk</span>
                </div>
            </div>

            <div class="grid grid-cols-3 m-4 z-10 relative">
                <div class="p-1.5 flex" v-for="cat in $page.props.categories" :key="cat">
                    <Link :href="route('category.index', { id: cat.id })" class="bg-white p-5">
                        <div class="text-2xl font-extrabold flex">{{ cat.name }}</div>
                        <div class="flex">
                            <img class="object-fill" :src="`images/categories/${cat.id}.png`" alt="">
                        </div>
                        <div class="pt-3 -mb-2 text-teal-800 font-bold hover:underline hover:text-red-400 cursor-pointer">
                            See More
                        </div>
                    </Link>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style>
.carousel__item {
    font-size: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.carousel__prev,
.carousel__next {
    width: 40px;
    height: 200px;
    color: rgb(196, 196, 196);
    margin-top: -100px;
    border: transparent
}

.carousel__prev:hover,
.carousel__next:hover {
    width: 40px;
    height: 200px;
    color: rgb(212, 212, 212);
    margin-top: -100px;
    border: 3px solid rgb(217, 217, 217);
}
</style>
