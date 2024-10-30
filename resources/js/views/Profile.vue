<template>
    <!-- nav bar -->
    <div
        class="w-full h-[100px] bg-white grid grid-cols-3 items-center px-6 border-b-[1px] border-black/10"
    >
        <!-- left side | logo and routes -->
        <div class="col-span-2 w-full h-fit flex gap-24 items-center">
            <!-- logo -->
            <div
                class="!w-[50px] !h-[50px] relative overflow-hidden justify-items-center"
            >
                <img
                    style="height: 50px !important"
                    src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/9d322810-86b7-4833-872b-3f382ea26c5e/d7uf4zk-b5e325d9-a245-4932-8c39-f01187e2863c.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcLzlkMzIyODEwLTg2YjctNDgzMy04NzJiLTNmMzgyZWEyNmM1ZVwvZDd1ZjR6ay1iNWUzMjVkOS1hMjQ1LTQ5MzItOGMzOS1mMDExODdlMjg2M2MucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.Pp768uGpCNbwaLL-nvL11tquuuY_7djqh-8g302qEL0"
                    alt="Logo"
                />
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
        <div class="w-full h-fit flex gap-6 items-center justify-end">
            <p>Logged in as:</p>

            <!-- user profile pic -->
            <div
                class="w-[50px] h-[50px] rounded-full relative overflow-hidden"
            >
                <img
                    class="w-full h-full object-cover"
                    src="/public/images/vegeta.png"
                    alt="profilePic"
                />
            </div>
        </div>
    </div>

    <!-- current announcements --><!--eventually could be a carousel-->
    <div class="bg-red-500/20 px-6 flex flex-col justify-center font-bold">
        <p class="text-2xl">Welcome to the dashboard, Adrian...</p>
        <p>This is the 1st iteration of MIC.com :) | We are in the process ofbuilding this website!</p>
    </div>

    <!-- main dashboard -->
    <div
        class="h-screen bg-green-300/15 grid grid-cols-5 px-6 border-green-500 border-2"
    >
        <!--left side | introduction SAVED FOR LATER-->
        <div class="col-span-2 flex flex-col place-content-center items-center">
            <p>Who is Michael?</p>
            <p>From those who knew him...</p>
            <p>Photos()</p>
            <p>Mission statement:</p>
        </div>

        <!-- right side | Todo List -->
        <div class="w-full h-fit col-span-3 bg-black/10">
            <!--Todo List | input & submission form-->
            <div class="col-span-3 grid grid-cols-3 items-center gap-4 border-2 border-red-500">
                <p class="text-xl font-bold p-2">What would you like to do today?</p>
                <input type="text" v-model="newTask" placeholder="Add a task" />
                <button @click="addTask">Submit</button>
            </div>

            <!--Todo List | task list-->
            <div class="h-[15%] items-center gap-4 border-2 border-red-500">
                <p>Tasks</p>
                <p>Sasks</p>
                <div class="text-xl border-2 border-blue-500 px-2"><p>{{ new_task }}</p> </div>
                <p>Flasks</p>
                <p>Basks</p>
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
        }
    },

};
</script>
