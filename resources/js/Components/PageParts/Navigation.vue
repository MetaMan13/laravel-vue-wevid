<template>
    <!-- Desktop Navigation START -->
    <div
        class="
            fixed
            top-0
            left-0
            z-50
            w-full
            h-12
            bg-white
            px-2
            flex
            items-center
            justify-between
            border-b border-gray-200
            md:px-4
        "
    >
        <!-- Logo START -->
        <div class="flex gap-1 items-center">
            <feather
                :height="22"
                :width="22"
                class="text-green-500 transform -rotate-90"
            >
            </feather>
            <h3 class="font-semibold text-lg">Wevid</h3>
        </div>
        <!-- Logo END -->

        <!-- Menu items START -->
        <div class="hidden">
            <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
                <li><a href="#">Link 4</a></li>
                <li><a href="#">Link 5</a></li>
            </ul>
        </div>
        <!-- Menu items END -->

        <!-- Dropdown menu items START -->
        <div class="hidden">
            <p>Dropdown Menu items</p>
        </div>
        <!-- Dropdown menu items END -->

        <!-- Hamburger menu START -->
        <div class="lg:hidden">
            <!-- Hamburger Icon START -->
            <div>
                <hamburger
                    :width="22"
                    :height="22"
                    @click="hamburgerMenuOpen = true"
                >
                </hamburger>
            </div>
            <!-- Hamburger Icon END -->

            <!-- Absolute Part START  -->
            <div
                v-show="hamburgerMenuOpen"
                class="absolute top-0 left-0 z-50 h-screen w-full bg-white"
            >
                <p>Hamburger Menu Content</p>
                <p
                    @click="hamburgerMenuOpen = false"
                    class="text-lg font-semibold"
                >
                    CLOSE
                </p>
            </div>
            <!-- Absolute Part START  -->
        </div>
        <!-- Hamburger menu END -->
    </div>
    <!-- Desktop Navigation END -->
</template>

<script>
import Feather from "../Icons/Feather.vue";
import Hamburger from "../Icons/Hamburger.vue";

export default {
    name: "Navigation",
    components: {
        Hamburger,
        Feather,
    },
    data() {
        return {
            hamburgerMenuOpen: false,
        };
    },
};
</script>
