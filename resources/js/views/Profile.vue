<template>
    <!-- main page -->
    <div class="bg-[#090030] min-h-screen h-fit grid">
        <div class="h-fit grid">
            <!-- nav bar -->
            <div class="w-full h-[100px] px-6 grid grid-cols-3 items-center font-medium bg-white ">
                <!-- nav bar | left side | logo and routes -->
                <div class="col-span-2 w-full h-fit flex gap-24 items-center">
                    <!-- logo -->
                    <div class="!w-[50px] !h-[50px] relative overflow-hidden justify-items-center">
                        <img style="height: 50px !important"
                            src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/9d322810-86b7-4833-872b-3f382ea26c5e/d7uf4zk-b5e325d9-a245-4932-8c39-f01187e2863c.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcLzlkMzIyODEwLTg2YjctNDgzMy04NzJiLTNmMzgyZWEyNmM1ZVwvZDd1ZjR6ay1iNWUzMjVkOS1hMjQ1LTQ5MzItOGMzOS1mMDExODdlMjg2M2MucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.Pp768uGpCNbwaLL-nvL11tquuuY_7djqh-8g302qEL0"
                            alt="Logo" />
                    </div>

                    <!-- nav bar | routes -->
                    <div class="w-fit h-fit flex items-center gap-8">
                        <p>Home</p>
                        <p>About</p>
                        <p>Services</p>
                        <p>Community</p>
                    </div>
                </div>

                <!-- right side | user profile -->
                <div class="w-full h-fit flex gap-6 items-center justify-end col-span-1">
                    <p>Logged in as:</p>

                    <!-- user profile pic -->
                    <div class="w-[50px] h-[50px] rounded-full relative overflow-hidden">
                        <img class="w-full h-full object-cover" src="/public/images/piccolo.jpg" alt="profilePic" />
                    </div>
                </div>
            </div>

            <!-- current announcements --><!--eventually could be a carousel-->
            <div class="bg-[#04879C] px-6 grid font-bold">
                <p>This is the 1st iteration of <span class="text-blue-600">MIC.com :)</span> | We are in the process of building this website!</p>
            </div>

            <!-- temporary dashboard-->
            <div class="w-full h-fit grid grid-cols-5 bg-white border-2 rounded-b-lg">
                <!--left side | introduction SAVED FOR LATER-->
                <div class="h-fit grid m-auto col-span-2">
                    <p class="bg-[#04879C]">Who is Michael?</p>
                    <p class="bg-[#0C3C78]">From those who knew him...</p>
                    <p class="bg-[#090030] text-white">Photos()</p>
                    <p class="bg-[#F30A49]">Mission statement:</p>
                </div>

                <!-- right side | Todo List -->
                <div class="h-[600px] col-span-3 m-4 p-9 bg-gradient-to-tr rounded-bl-lg from-[#04879C] to-[#F9FAFB] opacity-75 drop-shadow-2xl">
                    <div class="w-full h-fit grid gap-6">
                        <!--Todo List | input & submission form-->
                        <div class="grid grid-cols-5 gap-6 items-center">
                            <div class="col-span-3 flex flex-col border-b-2 border-black">
                                <label>
                                    <input class="w-full"  type="text" v-model="new_task.name" @keyup.enter="createTask" placeholder="Task Name:" />
                                </label>
                            </div>
                            <button :disabled="!new_task.name" class="col-span-2 text-white py-1 rounded-lg bg-[#04879C] disabled:opacity-50" @click="createTask" type="button">Submit Task</button>

                            <!--Enter Task Description to add to task list-->
                            <div v-if="descTask" class="col-span-5 flex flex-col border-b-2 border-black">
                                <label>
                                    <input class="w-full"  type="text" v-model="new_task.task" @keyup.enter="handleTask" placeholder="Task Description:" />
                                </label>
                            </div>
                        </div>
                        <!--Todo List | task list--><!--TODO: make this a scrollable list AND make the checkboxes work-->
                        <div class="w-full h-fit max-h-[400px] gap-4 overflow-y-auto divide-y drop-shadow-lg border-b-2 border-black">
                            <div v-for="(task, index) in tasks" :key="index"
                                class="grid grid-cols-6 px-2 py-1 bg-gradient-to-b from-white to-[#F9FAFB] border-l-8 border-black/10 border-l-transparent hover:border-l-[#04879C]">
                                <label class="col-span-4 truncate font-bold":for="index + 'checkbox'">{{ task.name }}</label>
                                <div class="col-span-2 flex items-center justify-end">
                                    <input class="accent-[#04879C]" type="checkbox" :id="index + 'checkbox'" />
                                    <button type="button" @click="task.showDesc = !task.showDesc" :id="index + 'button'"> <Icon icon="mdi:arrow-down" class="text-red-500"></Icon></button>
                                </div>
                                
                                <!--Task Description & Delete Button-->
                                <div v-if="task.showDesc" class="col-span-6 flex flex-col gap-2">
                                    <div class="w-full">{{ task.task }}</div>
                                    <div class="w-full flex gap-2">
                                        <button type="button" class="w-full flex items-center justify-center bg-[#04879C] text-white font-semibold rounded-lg" @click="markAsCompleted(task.id)">Mark as Completed<Icon icon="mdi:check" class="text-white"></Icon></button>
                                        <button type="button" class="w-full flex justify-center bg-[#F30A49] text-white font-semibold rounded-lg" @click="deleteTask(task.id)"> Delete<Icon icon="mdi:delete-empty" class="text-white"></Icon></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<!-- Create fucntion to handle new_task variable and add it to the task list, as well as reassign new_task to an empty string-->
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
        };
    },
    mounted() {
        axios.get('/tasks').then(response => {
            this.tasks = response.data;
            console.log(response.data);
        });
    },
    methods: {

        handleTask() {
            if (this.new_task.name && this.new_task.task) {
                axios.post('/tasks', { name: this.new_task.name, task: this.new_task.task })
                    .then(response => {
                        this.tasks.push(response.data);
                        this.new_task = {
                            name: "",
                            task: "",
                    };
                    console.log(response.data);
                })}
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
