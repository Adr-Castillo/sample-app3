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
                        <img class="w-full h-full object-cover" src="../assets/images/piccolo.jpg" alt="profilePic" />
                    </div>
                </div>
            </div>

            <!-- current announcements --><!--eventually could be a carousel-->
            <div class="bg-[#04879C] px-6 grid font-bold">
                <p>This is the 1st iteration of <span class="text-blue-600">MIC.com</span>
                    | What would you like to do today?</p>
            </div>

            <!-- temporary dashboard-->
            <div class="w-full h-fit flex bg-white border-2 rounded-b-lg">
                <!--left side | introduction SAVED FOR LATER-->
                <div class="h-fit grid m-auto col-span-2">
                    <p class="bg-[#04879C]">Who is Michael?</p>
                    <p class="bg-[#0C3C78]">From those who knew him...</p>
                    <p class="bg-[#090030] text-white">Photos()</p>
                    <p class="bg-[#F30A49]">Mission statement:</p>
                </div>

                <div>
                    <TodoList />
                </div>

            </div>
        </div>
    </div>
</template>
<!-- Create fucntion to handle new_task variable and add it to the task list, as well as reassign new_task to an empty string-->
<script>

import { Icon } from '@iconify/vue';
import TodoList from './TodoList.vue';

export default {
    name: "Profile",

    components: {
        Icon,
        TodoList
    },
}


</script>
