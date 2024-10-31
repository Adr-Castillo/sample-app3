<template>
    <!-- main page -->
    <div class="bg-blue-600/55 min-h-screen h-fit grid">
        <div class="h-fit grid">
            <!-- nav bar -->
            <div class="w-full h-[100px] bg-white grid grid-cols-3 items-center px-6 border-b-[1px] border-black/10">
                <!-- left side | logo and routes -->
                <div class="col-span-2 w-full h-fit flex gap-24 items-center">
                    <!-- logo -->
                    <div class="!w-[50px] !h-[50px] relative overflow-hidden justify-items-center">
                        <img style="height: 50px !important"
                            src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/9d322810-86b7-4833-872b-3f382ea26c5e/d7uf4zk-b5e325d9-a245-4932-8c39-f01187e2863c.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcLzlkMzIyODEwLTg2YjctNDgzMy04NzJiLTNmMzgyZWEyNmM1ZVwvZDd1ZjR6ay1iNWUzMjVkOS1hMjQ1LTQ5MzItOGMzOS1mMDExODdlMjg2M2MucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.Pp768uGpCNbwaLL-nvL11tquuuY_7djqh-8g302qEL0"
                            alt="Logo" />
                    </div>

                    <!-- routes -->
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
                        <img class="w-full h-full object-cover" src="/public/images/vegeta.png" alt="profilePic" />
                    </div>
                </div>
            </div>

            <!-- current announcements --><!--eventually could be a carousel-->
            <div class="bg-red-500/20 px-6 grid font-bold">
                <p class="text-xl">Welcome to the dashboard, Adrian...</p>
                <p>This is the 1st iteration of MIC.com :) | We are in theprocess ofbuilding this website!</p>
            </div>

            <!-- dashboard-->
            <div class="w-full h-fit grid grid-cols-5 border-2 border-green-500">
                <!--left side | introduction SAVED FOR LATER-->
                <div class="h-fit grid m-auto col-span-2">
                    <p>Who is Michael?</p>
                    <p>From those who knew him...</p>
                    <p>Photos()</p>
                    <p>Mission statement:</p>
                </div>

                <!-- right side | Todo List -->
                <div class=" h-[600px] grid col-span-3 border-2 border-black/30 rounded-lg bg-white m-4 p-6">
                    <!--Todo List | input & submission form-->
                    <div class="h-fit grid grid-cols-5 items-center gap-4 border-b-2 border-black">
                        <label for="task_input">What would you like to do today?</label>
                        <input class="col-span-3" id="task_input" type="text" v-model="new_task" @keyup.enter="addTask"
                            placeholder="Add a task" />
                        <button :disabled="!new_task" class="text-white py-2 rounded-lg bg-blue-500 disabled:opacity-50" @click="addTask" type="button">Submit</button>
                    </div>

                    <!--Todo List | task list--><!--TODO: make this a scrollable list AND make the checkboxes work-->
                    <div class="w-full items-center gap-4 border-2 border-red-500 overflow-y-auto">
                        <div v-for="(task, index) in tasks" :key="index"
                            class="flex items-center justify-between border-2 border-blue-500 px-2">
                            <label :for="index + 'checkbox'">{{ task }}</label>
                            <input type="checkbox" :id="index + 'checkbox'" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<!-- Create fucntion to handle new_task variable and add it to the task list, as well as reassign new_task to an empty string-->
<script>
export default {
    name: "Profile",
    data() {
        return {
            new_task: "",
            tasks: [],
        };
    },
    methods: {
        addTask() {
            if (this.new_task.length < 1) {
                alert("Please enter a task");
                return;
            }
            this.tasks.push(this.new_task.trim());
            this.new_task = "";
        },
    }
};
</script>
