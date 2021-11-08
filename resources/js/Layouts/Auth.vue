<template>
    <div
        class="w-full h-screen bg-gray-100 dark:bg-gray-900 flex flex-col items-center justify-center text-gray-600 dark:text-gray-200"
    >
        <div
            class="dark:bg-gray-900 w-full flex flex-col rounded-md md:gap-0 sm:max-w-sm md:max-w-md"
        >
            <!-- Application Logo -->
            <div class="flex gap-1 items-center justify-center py-6 text-center md:py-6">
                <div>
                    <h3 class="font-semibold text-3xl select-none">Wevid</h3>
                </div>
                <div>
                    <feather :width="34" :height="34" class></feather>
                </div>
            </div>
            <slot></slot>
        </div>
    </div>
</template>

<script>
import Feather from "Icons/Feather";
export default {
    name: "Auth",
    components: {
        Feather,
    },
};
</script>
