
<template>
    <div  v-if="successlist.length > 0">
        <h3 class="py-2 text-green-400 font-bold text-left text-lg">Completed Todos</h3>
        <table class="w-full text-sm text-left border">
            <thead class="text-darkGray bg-lightGray">
                <tr>
                    <th class="px-4 bg-gray-100 border">No.</th>
                    <th class="px-4 bg-gray-100 border">List</th>
                    <th class="px-4 bg-gray-100 border">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(list, index) in successlist" :key="list.id">
                    <td class="border">{{ index + 1 }}</td>
                    <td class="border text-ellipsis overflow-hidden">{{ list.title }}</td>
                    <td>
                        <button
                            class="bg-red-500 border hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                            @click="destroy(list.id)"
                        >
                            Delete
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import { defineComponent, computed } from 'vue'; 
import { usePage,router } from '@inertiajs/vue3'; 

export default defineComponent({
    props: {
        successlist: {
            type: Array,
        }
    },
    methods:{
        destroy(id){
            router.delete(route('todos.delete', id), {
                onError: (e) => {
                    console.error('Error deleting the todo:', e);
                }
            });
        }
    }
});
</script>

<style>
/* Your styles here */
</style>
