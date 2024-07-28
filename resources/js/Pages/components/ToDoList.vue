<template>
    <table class="w-full text-sm text-left">
        <thead class="text-darkGray bg-lightGray">
            <tr>
                <th class="px-4 py-2 bg-gray-100 border border-gray-300">No.</th>
                <th class="px-4 py-2 bg-gray-100 border border-gray-300">List</th>
                <th class="px-4 py-2 bg-gray-100 border border-gray-300">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(list, index) in todolist" :key="list.id">
                <td>{{ index + 1 }}</td>
                <td class="text-ellipsis overflow-hidden">{{ list.title }}</td>
                <td>
                    <button
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-3"
                        @click="completedToDo(list.id)"
                    >
                        Done
                    </button>
                    <button
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                        @click="destroy(list.id)"
                    >
                        Delete
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
import { route } from 'ziggy-js';
import { usePage, router } from '@inertiajs/vue3';
import { computed } from 'vue';

export default {
    setup(props) {
        const todolist = computed(() => props.todolist || []);

        const destroy = (id) => {
            router.delete(route('todos.delete', id), {
                onError: (e) => {
                    console.error('Error deleting the todo:', e);
                }
            });
        };

        const completedToDo = (id)=>{
            router.put(route('todos.update',id),{
                onSuccess :()=>{
                    console.log('Updated the todo:', id)
                }
            })
        }

        return {
            todolist,
            destroy,
            completedToDo
        };
    },
    props: {
        todolist: {
            type: Array,
            default: () => []
        }
    }
};
</script>

<style>
/* Your styles here */
</style>
