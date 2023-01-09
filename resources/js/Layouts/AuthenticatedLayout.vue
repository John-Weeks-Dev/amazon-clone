<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';
import MapMarkerOutlineIcon from 'vue-material-design-icons/MapMarkerOutline.vue';
import MenuDownIcon from 'vue-material-design-icons/MenuDown.vue';
import MagnifyIcon from 'vue-material-design-icons/Magnify.vue';
import CartMinusIcon from 'vue-material-design-icons/CartMinus.vue';
import MenuIcon from 'vue-material-design-icons/Menu.vue';
import AccountCircleIcon from 'vue-material-design-icons/AccountCircle.vue';
import CloseIcon from 'vue-material-design-icons/Close.vue';
import ChevronRightIcon from 'vue-material-design-icons/ChevronRight.vue';

import { useCartStore } from '@/store/cart';
const cartStore = useCartStore()

let showMenu = ref(false)
let accountAndList = ref(false)

const accountAndListFunc = (bool) => {
    setTimeout(() => {
        accountAndList.value = bool
    }, 150)
}
</script>

<template>
    <div class="min-w-[1150px] bg-gray-100 h-full">

        <div v-if="accountAndList" class="top-0 z-20 fixed w-full h-full bg-black bg-opacity-70"></div>

        <div class="flex items-center bg-gray-900 h-[60px] py-2 fixed z-50 min-w-[1150px] w-full">

            <div class="flex">
                <Link :href="route('dashboard')" class="text-white h-[50px] p-2 pt-3 border-[1px] border-gray-900 rounded-sm hover:border-[1px] hover:border-gray-100 cursor-pointer">
                    <img width="100" src="/images/logo/AMAZON_LOGO.png">
                </Link>
            </div>


            <div class="text-white h-[50px] p-2 border-[1px] border-gray-900 rounded-sm hover:border-[1px] hover:border-gray-100 cursor-pointer">
                <Link v-if="$page.props.auth.user" :href="route('address.index')">
                    <div class="flex items-center justify-center">
                        <MapMarkerOutlineIcon class="pt-2 -ml-1" fillColor="#f5f5f5" />

                        <div>
                            <div class="text-[13px] text-gray-300 font-extrabold">
                                <div>Delivery to {{ $page.props.auth.user.first_name }}</div>
                            </div>

                            <div v-if="$page.props.auth.address" class="text-[15px] text-white -mt-1.5 font-extrabold">
                                <div>{{ $page.props.auth.address.city }} {{ $page.props.auth.address.postcode }}</div>
                            </div>
                            <div v-else class="text-[15px] text-white -mt-1.5 font-extrabold">
                                <div>Add address</div>
                            </div>
                        </div>
                    </div>
                </Link>

                <div v-else class="flex items-center justify-center">
                    <MapMarkerOutlineIcon class="pt-2 -ml-1" fillColor="#f5f5f5" />
                    <div>
                        <div class="text-[13px] text-gray-300 font-extrabold">
                            <div>Hello</div>
                            <div class="text-[15px] text-white -mt-1.5 font-extrabold">Select your address</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex grow items-center h-[45px] px-1">
                <div class="flex items-center justify-center bg-gray-100 border-r border-r-gray-300 font-extrabold text-[11px] text-gray-600 w-[60px] h-[40px] rounded-l-md cursor-pointer">
                    <div class="pt-[3px]">
                        All
                    </div>
                    <MenuDownIcon fillColor="#5E5E5E" :size="20" class="-mr-2"/>
                </div>
                <input class="block w-full border-none border-transparent focus:border-transparent focus:ring-0" type="text">
                <div class="cursor-pointer bg-orange-300 p-[5px] px-2 rounded-r-md">
                    <MagnifyIcon :size="30" />
                </div>
            </div>

            <div class="flex">
                <div class="h-[50px] p-2 border-[1px] border-gray-900 rounded-sm hover:border-[1px] hover:border-gray-100 cursor-pointer">
                    <div class="flex items-center justify-center mt-2.5 px-1">
                        <img class="mb-3 mr-1" width="23" src="/images/flags/US.png" alt="">
                        <div class="text-[15px] text-white -mt-2 -mr-0.5 font-extrabold">EN</div>
                        <MenuDownIcon fillColor="#c2c2c2" :size="20" class="-mr-4 -mt-1.5 pr-1"/>
                    </div>
                </div>

                <div @mouseenter="accountAndListFunc(true)" @mouseleave="accountAndListFunc(false)" class="h-[50px] p-2 border-[1px] border-gray-900 rounded-sm hover:border-[1px] hover:border-gray-100 cursor-pointer">
                    <div class="flex items-center justify-center">
                        <div>
                            <div class="text-[12px] text-white font-extrabold">
                                Hello,
                                <span v-if="$page.props.auth.user">{{ $page.props.auth.user.first_name }}</span>
                                <span v-else>sign in</span>
                            </div>
                            <div class="flex items-center">
                                <div class="text-[15px] text-white -mt-1.5 font-extrabold">Account & List</div>
                                <MenuDownIcon fillColor="#c2c2c2" :size="20" class="-mr-4 -mt-1 pr-1"/>
                            </div>
                        </div>
                    </div>

                    <div v-if="accountAndList" class="bg-white absolute z-50 top-[56px] -ml-[230px] w-[480px] rounded-sm px-6">
                        <div v-if="$page.props.auth.user">
                            <div class="flex items-center justify-between py-2.5 border-b">
                                <div class="text-smp-2">Who's shopping? Select a profile.</div>
                                <div class="flex items-center text-sm font-bold text-teal-600 hover:text-red-600 hover:underline">
                                    Manage profile
                                    <ChevronRightIcon :size="20" fillColor="#808080" />
                                </div>
                            </div>

                            <div class="flex">
                                <div class="w-1/2 border-r">
                                    <div class="pb-3">
                                        <div class="font-extrabold pt-3">Your List</div>
                                        <div class="text-sm hover:text-red-600 hover:underline pt-3">Create a list</div>
                                    </div>
                                </div>
                                <div class="w-1/2 ml-5">
                                    <div class="pb-3">
                                        <div class="font-extrabold pt-3">Your Account</div>
                                        <Link
                                            :href="route('profile.edit')"
                                            class="text-sm block hover:text-red-600 hover:underline pt-3"
                                        >
                                            Account
                                        </Link>
                                        <Link
                                            :href="route('logout')"
                                            method="post"
                                            as="button"
                                            class="text-sm block hover:text-red-600 hover:underline pt-3"
                                        >
                                            Sign Out
                                        </Link>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div v-else class="p-4 text-center">
                            <div class="p-4 text-center"></div>
                            <Link
                                :href="route('login')"
                                class="
                                    text-center
                                    items-center
                                    px-20
                                    py-1.5
                                    bg-[#fcba1f]
                                    border
                                    border-gray-600
                                    rounded-sm
                                    text-sm
                                    font-extrabold
                                    text-black
                                "
                            >
                                Sign in
                            </Link>
                            <div class="text-sm pt-4">
                                New customer?
                                <Link :href="route('register')" class="text-blue-700 hover:text-red-700">
                                    Start here.
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="h-[50px] p-2 border-[1px] border-gray-900 rounded-sm hover:border-[1px] hover:border-gray-100 cursor-pointer">
                    <div class="flex items-center justify-center">
                        <div>
                            <div class="text-[12px] text-white font-extrabold"> Returns </div>
                            <div class="flex items-center">
                                <div class="text-[15px] text-white -mt-1.5 font-extrabold">& Orders</div>
                            </div>
                        </div>
                    </div>
                </div>

                <Link :href="route('cart.index')" class="relative h-[50px] p-2 border-[1px] border-gray-900 rounded-sm hover:border-[1px] hover:border-gray-100 cursor-pointer">
                    <span class="absolute text-center right-[21px] w-[14px] -top-0 rounded-full text-[20px]">
                        <div class="text-orange-400 font-extrabold bg-gray-900 h-[16px]">{{ cartStore.cart.length }}</div>
                    </span>
                    <div class="flex items-center justify-center">
                        <CartMinusIcon fillColor="#FCFCFC" :size="40" class="-mt-0.5"/>
                    </div>
                </Link>
            </div>

        </div>

        <div class="flex items-center justify-between bg-[#232f3e] h-[38px] fixed z-40 min-w-[1150px] w-full mt-[60px]">
            <div class="flex">
                <div @click="showMenu = true" class="flex h-[30px] border-[1px] border-[#232f3e] rounded-sm hover:border-[1px] hover:border-gray-100 cursor-pointer">
                    <div class="flex items-center justify-between px-2">
                        <MenuIcon fillColor="#F5F5F5" :size="26" class="mr-0.5" />
                        <div class="text-[14px] text-white font-extrabold">All</div>
                    </div>
                </div>
                <div class="flex h-[30px] border-[1px] border-[#232f3e] rounded-sm hover:border-[1px] hover:border-gray-100 cursor-pointer">
                    <div class="flex items-center justify-between px-2">
                        <div class="text-[14px] text-white font-extrabold">Today's Deals</div>
                    </div>
                </div>
                <div class="flex h-[30px] border-[1px] border-[#232f3e] rounded-sm hover:border-[1px] hover:border-gray-100 cursor-pointer">
                    <div class="flex items-center justify-between px-2">
                        <div class="text-[14px] text-white font-extrabold">Gift Cards</div>
                    </div>
                </div>
                <div class="flex h-[30px] border-[1px] border-[#232f3e] rounded-sm hover:border-[1px] hover:border-gray-100 cursor-pointer">
                    <div class="flex items-center justify-between px-2">
                        <div class="text-[14px] text-white font-extrabold">Buy Again</div>
                    </div>
                </div>
                <div class="flex h-[30px] border-[1px] border-[#232f3e] rounded-sm hover:border-[1px] hover:border-gray-100 cursor-pointer">
                    <div class="flex items-center justify-between px-2">
                        <div class="text-[14px] text-white font-extrabold">Customer Service</div>
                    </div>
                </div>
                <div class="flex h-[30px] border-[1px] border-[#232f3e] rounded-sm hover:border-[1px] hover:border-gray-100 cursor-pointer">
                    <div class="flex items-center justify-between px-2">
                        <div class="text-[14px] text-white font-extrabold">John's Amazon.com</div>
                    </div>
                </div>

            </div>
            <div class="flex">
                <div class="flex h-[30px] border-[1px] border-[#232f3e] rounded-sm hover:border-[1px] hover:border-gray-100 cursor-pointer">
                    <div class="flex items-center justify-between px-2">
                        <div class="text-[14px] text-white font-extrabold">Holiday Fasion Deals</div>
                    </div>
                </div>
            </div>
        </div>

        <main class="max-w-[1500px] mx-auto">
            <div class="pt-[98px]"></div>
            <slot />
        </main>

        <div class="w-full bg-white mt-10 overflow-x-scroll">
            <div class="max-w-[1500px] mx-auto">
                <div class="text-[23px] pt-4 font-extrabold">Recommended based on your shopping trends</div>
                <div class="flex justify-center items-stretch">
                    <div v-for="product in $page.props.random_products" :key="product">
                        <div class="p-4 text-center mx-auto">
                            <div class="w-[158px] h-[150px] overflow-hidden">
                                <img :src="product.image">
                            </div>
                            <Link :href="route('product.index', { id: product.id })">
                                <div class="w-[160px] text-[12px] py-2 text-teal-600 font-extrabold hover:text-red-600 cursor-pointer">
                                    {{ product.title.substring(0, 40) }}...
                                </div>
                            </Link>
                            <div class="flex justify-start">
                                <div class="text-xs font-extrabold text-red-600 w-full text-left">${{ product.price }}</div>
                                <img width="50" src="/images/logo/PRIME_LOGO.PNG" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="bg-[#232F3E]">
            <div class="bg-[#37475A] hover:bg-gray-600 w-full p-3.5 cursor-pointer text-white font-extrabold text-center">
                Back to top
            </div>
            <div class="flex items-stretch justify-between max-w-[1000px] mx-auto p-10 text-white">
                <ul>
                    <li class=" font-extrabold text-lg">Get to Know Us</li>
                    <li class="hover:underline cursor-pointer">Careers</li>
                    <li class="hover:underline cursor-pointer">About Amazon</li>
                    <li class="hover:underline cursor-pointer">Investor Relations</li>
                    <li class="hover:underline cursor-pointer">Amazon Devices</li>
                    <li class="hover:underline cursor-pointer">Amazon Science</li>
                </ul>

                <ul>
                    <li class=" font-extrabold text-lg">Make Money with Us</li>
                    <li class="hover:underline cursor-pointer">Sell products on Amazon</li>
                    <li class="hover:underline cursor-pointer">Sell on Amazon Business</li>
                    <li class="hover:underline cursor-pointer">Sell apps on Amazon</li>
                    <li class="hover:underline cursor-pointer">Become an Affiliate</li>
                    <li class="hover:underline cursor-pointer">Advertise Your Products</li>
                    <li class="hover:underline cursor-pointer">Self-Publish with Us</li>
                    <li class="hover:underline cursor-pointer">Host an Amazon Hub</li>
                </ul>

                <ul>
                    <li class=" font-extrabold text-lg">Get to Know Us</li>
                    <li class="hover:underline cursor-pointer">Careers</li>
                    <li class="hover:underline cursor-pointer">About Amazon</li>
                    <li class="hover:underline cursor-pointer">Investor Relations</li>
                    <li class="hover:underline cursor-pointer">Amazon Devices</li>
                    <li class="hover:underline cursor-pointer">Amazon Science</li>
                </ul>

                <ul>
                    <li class=" font-extrabold text-lg">Make Money with Us</li>
                    <li class="hover:underline cursor-pointer">Sell products on Amazon</li>
                    <li class="hover:underline cursor-pointer">Sell on Amazon Business</li>
                    <li class="hover:underline cursor-pointer">Sell apps on Amazon</li>
                    <li class="hover:underline cursor-pointer">Become an Affiliate</li>
                    <li class="hover:underline cursor-pointer">Advertise Your Products</li>
                    <li class="hover:underline cursor-pointer">Self-Publish with Us</li>
                    <li class="hover:underline cursor-pointer">Host an Amazon Hub</li>
                </ul>
            </div>
        </footer>
    </div>

    <div
        v-if="showMenu"
        class="top-0 z-50 fixed w-full h-full bg-black bg-opacity-70"
        :class="[showMenu ? 'animate__animated animate__fadeIn animate__faster' : '']"
    >

        <CloseIcon
            @click="showMenu = false"
            :size="30"
            fillColor="#DCDCDC"
            class="ml-2.5 mt-3.5 left-80 cursor-pointer fixed z-50"
            :class="[showMenu ? 'animate__animated animate__fadeIn animate__faster' : '']"
        />

        <div
            class="w-80 h-full bg-white"
            :class="[showMenu ? 'animate__animated animate__slideInLeft animate__faster' : '']"
        >
            <div class="bg-[#232f3e] font-extrabold text-[18px] flex items-center p-2 text-white pl-7">
                <span>Hello, Sign in</span>
            </div>

            <div class="font-extrabold text-[16px] pt-3 pb-1 pl-6 pr-3 text-black">
                Shop By Department
            </div>

            <div v-for="cat in $page.props.categories" :key="cat">
                <div class="hover:bg-gray-200 pl-6 pr-3">
                    <Link :href="route('category.index', { id: cat.id })" class="py-2.5 text-[13px] text-black flex justify-between items-center hover:bg-gray-200 cursor-pointer">
                        {{ cat.name }} <ChevronRightIcon :size="20" fillColor="#808080" />
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>
