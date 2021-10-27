<template>

    <!-- Mobile User Action Bar START -->
    <div class="fixed bottom-0 left-0 z-40 h-12 w-full flex justify-between items-center px-4 bg-white border-t border-gray-200 md:px-4 lg:hidden">

            <!-- Menu items START -->
            <div>
                <feather
                :height="22"
                :width="22"
                >
                </feather>
            </div>

            <div>
                <feather
                :height="22"
                :width="22"
                >
                </feather>
            </div>

            <div>
                <feather
                :height="22"
                :width="22"
                >
                </feather>
            </div>

            <div>
                <feather
                :height="22"
                :width="22"
                >
                </feather>
            </div>

            <div>
                <feather
                :height="22"
                :width="22"
                >
                </feather>
            </div>
            <!-- Menu items END -->

        </div>
        <!-- Mobile User Action Bar END -->
</template>

<script>

import Feather from './../Icons/Feather.vue'

export default {
    name: 'UserActionBar',
    components:{
        Feather,
    }
}
</script>