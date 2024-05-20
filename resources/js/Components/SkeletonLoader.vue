<template>
    <div class="container">
        <div class=" grid grid-cols-4 gap-4 my-6 ">
            <div v-for="index in 4" :key="index">
            <a :href="hotelUrl " class=" ">
                <div class="h-[340px] w-full animate-pulse  overflow-hidden">
                    <div class="h-[200px] w-full rounded-lg bg-gray-200"></div>
                    <div class="mt-[12px] flex h-[250px] justify-between bg-white p-2">
                        <div class="mt-2 flex justify-between bg-white pl-2">
                            <div class="flex flex-col">
                                <span class="text-md"> </span>
                                <span class="text-md mt-2 w-24 rounded-lg border-4 border-gray-200 font-semibold text-black"></span>
                                <span class="text-md mt-8 w-24 rounded-lg border-4 border-gray-200 font-semibold text-black"></span>
                                <span class="mt-2 w-24 rounded-lg border-4 border-gray-200 text-sm font-normal text-gray-600"></span>
                                <span class="text-md w-16 rounded-lg border-4 border-gray-200 font-semibold text-gray-400"></span>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-md w-1 rounded-lg border-4 border-gray-200 font-semibold text-black"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    name: "SkeletonLoader"
}
</script>

<style scoped>

</style>
