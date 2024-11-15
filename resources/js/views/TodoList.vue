<template>

<!-- right side | Todo List -->
<div
class="h-[600px] col-span-3 m-4 p-9 bg-gradient-to-tr rounded-bl-lg from-[#04879C] to-[#F9FAFB] opacity-75 drop-shadow-2xl">
<div class="w-full h-fit grid gap-6">
    <!--Todo List | Task Name-->
    <div class="grid grid-cols-5 gap-6 items-center">
        <div class="col-span-3 flex flex-col border-b-2 border-black">
            <label><input class="w-full font-semibold" type="text" v-model="new_task.name"
                    @keyup.enter="createTask" placeholder="Task Name:" /></label>
        </div>

        <!--Create Task Button-->
        <button :disabled="!new_task.name"
            class="col-span-2 text-white py-1 rounded-lg bg-[#04879C] disabled:opacity-50"
            @click="!new_task.task ? createTask() : handleTask()" type="button">
            <div v-if="!descTask">Create Task</div>
            <div v-else>Submit Task</div>
        </button>

        <!--Todo List | Task Description-->
        <div v-if="descTask" class="col-span-5 flex flex-col border-b-2 border-black">
            <label><input class="w-full" type="text" v-model="new_task.task"
                    @keyup.enter="handleTask" placeholder="Task Description:" /></label>
        </div>
    </div>
    <!--Todo List | task list-->
    <div>
        <!--Todo List | Header-->
        <div
            class="flex justify-between bg-[#F30A49] rounded-t-md border-x-4 mr-2 mb-1 border-transparent text-white">
            <div>Current Tasks</div>
            <div>Select All</div>
            <div class="col-span-2 flex items-center justify-end">
                <button type="button" @click="currentTasks = !currentTasks" :id="index + 'button'">
                    <div v-if=!currentTasks>
                        <Icon icon="clarity:eye-show-solid" class="text-white-500"></Icon>
                    </div>
                    <div v-else>
                        <Icon icon="clarity:eye-hide-solid" class="text-white-500"></Icon>
                    </div>
                </button>
            </div>
        </div>
        <div v-if="currentTasks"
            class="w-full h-fit max-h-[400px] gap-4 overflow-y-auto divide-y drop-shadow-lg border-b-2 border-[#F30A49]">

            <div v-for="(task, index) in tasks" :key="index"
                class="grid grid-cols-6 px-2 py-1 bg-gradient-to-b from-white to-[#F9FAFB] border-l-8 border-black/10 border-l-transparent hover:border-l-[#F30A49]">
                <label class="col-span-4 truncate font-bold" :for="index + 'checkbox'">
                    {{ task.name }}</label>
                <div class="col-span-2 flex items-center justify-end">
                    <input class="accent-[#04879C]" type="checkbox" :id="index + 'checkbox'" />
                    <button type="button" @click="task.showDesc = !task.showDesc"
                        :id="index + 'button'">
                        <Icon icon="mdi:arrow-down" class="text-red-500"></Icon>
                    </button>
                </div>

                <!--Task Description & Delete Button-->
                <div v-if="task.showDesc" class="col-span-6 flex flex-col gap-2">
                    <div class="w-full">{{ task.task }}</div>
                    <div class="w-full flex gap-2">
                        <button type="button"
                            class="w-full flex items-center justify-center bg-[#04879C] text-white font-semibold rounded-lg"
                            @click="markAsCompleted(task.id)">Mark as Completed<Icon
                                icon="mdi:check" class="text-white"></Icon></button>
                        <button type="button"
                            class="w-full flex justify-center bg-[#F30A49] text-white font-semibold rounded-lg"
                            @click="deleteTask(task.id)"> Delete<Icon icon="mdi:delete-empty"
                                class="text-white"></Icon></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>       
</template>

<script>

import { Icon } from '@iconify/vue';
import axios from 'axios';

export default {
    name: "Profile",
    data() {
        return {
            new_task: {
                name: "",
                task: "",
            },
            tasks: [],
            showDesc: false,
            descTask: false,
            currentTasks: false,
        };
    },
    mounted() {
        axios.get('/tasks').then(response => {
            this.tasks = response.data;
            console.log(response.data);
        });
    },
    methods: {

        createTask() {
            if (this.new_task.name) {
                this.descTask = true
            }
        },

        handleTask() {
            if (this.new_task.name && this.new_task.task) {
                axios.post('/tasks', { name: this.new_task.name, task: this.new_task.task })
                    .then(response => {
                        this.tasks.push(response.data);
                        this.new_task = {
                            name: "",
                            task: "",
                        };
                        this.descTask = false,
                            console.log(response.data); // DELETE WHEN DONE TESTING
                    })
            }
            else {
                alert("Please enter a Task Name & Description.");
            }
        },

        deleteTask(id) {
            axios.delete(`/tasks/${id}`).then(response => {
                this.tasks = this.tasks.filter(task => task.id !== id);
            });
        },
    },
    components: {
        Icon,
        
    },
};
</script>