<template>
    <div class="flex flex-col items-center min-h-screen w-full text-center">
    <div class="max-w-lg rounded overflow-hidden shadow-lg mt-5  border p-5">
            <h5 class="text-3xl font-bold w-[50%] leading-[1.2] text-lime-500">
                To Do Page
            </h5>
            <div class="flex mt-3">
                <input
                    type="text"
                    name=""
                    v-model="newtodo"
                    id=""
                    class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mr-3"
                    placeholder="..."
                />
                <button
                    class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                    @click="saveToDo()"
                >
                    Add To Do
                </button>
            </div>
            <div class="mt-4 w-96">
                <ToDoList :todolist="incompleteTodos" />
            </div>
            <div class="mt-4 w-96">
                <SuccessList :successlist="completedTodos" />
            </div>
        </div>
    </div>
</template>

<script>
import ToDoList from "./ToDoList.vue";
import { router } from "@inertiajs/vue3";
import SuccessList from './SuccessList.vue'
export default {
    data() {
        return {
            newtodo: "",
        };
    },
    props: {
        todos: Array,
    },
    components: {
        ToDoList,
        SuccessList
    },

    methods: {
        saveToDo() {
            console.log("Sending request:", { newtodo: this.newtodo });
            router.post(
                "/todos",
                { newtodo: this.newtodo }
            );
            this.newtodo = "";
            console.log(this.todos)
        },
    },
    computed:{
        completedTodos() {
            return this.todos.filter(todo => todo.status === 'completed');
        },
        incompleteTodos() {
            return this.todos.filter(todo => todo.status !== 'completed');
        }
    }
};
</script>

<style scoped></style>
