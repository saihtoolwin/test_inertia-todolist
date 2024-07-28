<template>
    <div class="flex flex-col items-center  min-h-screen text-center  font-serif mt-5">
        <h4 class="text-6xl font-bold w-[50%] leading-[1.2] text-lime-500 mt-8">
           Wellcome
        </h4>
        <!-- <button class="./ToDoPage">Make To Do List</button> -->
        <Buttom
            text="Make To Do List"
            href="/todos"
            type="link"
            class="mt-4"
        />
    </div>
</template>

<script>
import Buttom from "./components/Buttom.vue";
export default {
    components: {
        Buttom,
    },
};
</script>

<style></style>
